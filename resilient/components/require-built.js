/** vim: et:ts=4:sw=4:sts=4
 * @license RequireJS 2.1.5 Copyright (c) 2010-2012, The Dojo Foundation All Rights Reserved.
 * Available via the MIT or new BSD license.
 * see: http://github.com/jrburke/requirejs for details
 */
//Not using strict: uneven strict support in browsers, #392, and causes
//problems with requirejs.exec()/transpiler plugins that may not be strict.
/*jslint regexp: true, nomen: true, sloppy: true */
/*global window, navigator, document, importScripts, setTimeout, opera */

var requirejs, require, define;
(function (global) {
    var req, s, head, baseElement, dataMain, src,
        interactiveScript, currentlyAddingScript, mainScript, subPath,
        version = '2.1.5',
        commentRegExp = /(\/\*([\s\S]*?)\*\/|([^:]|^)\/\/(.*)$)/mg,
        cjsRequireRegExp = /[^.]\s*require\s*\(\s*["']([^'"\s]+)["']\s*\)/g,
        jsSuffixRegExp = /\.js$/,
        currDirRegExp = /^\.\//,
        op = Object.prototype,
        ostring = op.toString,
        hasOwn = op.hasOwnProperty,
        ap = Array.prototype,
        apsp = ap.splice,
        isBrowser = !!(typeof window !== 'undefined' && navigator && document),
        isWebWorker = !isBrowser && typeof importScripts !== 'undefined',
        //PS3 indicates loaded and complete, but need to wait for complete
        //specifically. Sequence is 'loading', 'loaded', execution,
        // then 'complete'. The UA check is unfortunate, but not sure how
        //to feature test w/o causing perf issues.
        readyRegExp = isBrowser && navigator.platform === 'PLAYSTATION 3' ?
                      /^complete$/ : /^(complete|loaded)$/,
        defContextName = '_',
        //Oh the tragedy, detecting opera. See the usage of isOpera for reason.
        isOpera = typeof opera !== 'undefined' && opera.toString() === '[object Opera]',
        contexts = {},
        cfg = {},
        globalDefQueue = [],
        useInteractive = false;

    function isFunction(it) {
        return ostring.call(it) === '[object Function]';
    }

    function isArray(it) {
        return ostring.call(it) === '[object Array]';
    }

    /**
     * Helper function for iterating over an array. If the func returns
     * a true value, it will break out of the loop.
     */
    function each(ary, func) {
        if (ary) {
            var i;
            for (i = 0; i < ary.length; i += 1) {
                if (ary[i] && func(ary[i], i, ary)) {
                    break;
                }
            }
        }
    }

    /**
     * Helper function for iterating over an array backwards. If the func
     * returns a true value, it will break out of the loop.
     */
    function eachReverse(ary, func) {
        if (ary) {
            var i;
            for (i = ary.length - 1; i > -1; i -= 1) {
                if (ary[i] && func(ary[i], i, ary)) {
                    break;
                }
            }
        }
    }

    function hasProp(obj, prop) {
        return hasOwn.call(obj, prop);
    }

    function getOwn(obj, prop) {
        return hasProp(obj, prop) && obj[prop];
    }

    /**
     * Cycles over properties in an object and calls a function for each
     * property value. If the function returns a truthy value, then the
     * iteration is stopped.
     */
    function eachProp(obj, func) {
        var prop;
        for (prop in obj) {
            if (hasProp(obj, prop)) {
                if (func(obj[prop], prop)) {
                    break;
                }
            }
        }
    }

    /**
     * Simple function to mix in properties from source into target,
     * but only if target does not already have a property of the same name.
     */
    function mixin(target, source, force, deepStringMixin) {
        if (source) {
            eachProp(source, function (value, prop) {
                if (force || !hasProp(target, prop)) {
                    if (deepStringMixin && typeof value !== 'string') {
                        if (!target[prop]) {
                            target[prop] = {};
                        }
                        mixin(target[prop], value, force, deepStringMixin);
                    } else {
                        target[prop] = value;
                    }
                }
            });
        }
        return target;
    }

    //Similar to Function.prototype.bind, but the 'this' object is specified
    //first, since it is easier to read/figure out what 'this' will be.
    function bind(obj, fn) {
        return function () {
            return fn.apply(obj, arguments);
        };
    }

    function scripts() {
        return document.getElementsByTagName('script');
    }

    //Allow getting a global that expressed in
    //dot notation, like 'a.b.c'.
    function getGlobal(value) {
        if (!value) {
            return value;
        }
        var g = global;
        each(value.split('.'), function (part) {
            g = g[part];
        });
        return g;
    }

    /**
     * Constructs an error with a pointer to an URL with more information.
     * @param {String} id the error ID that maps to an ID on a web page.
     * @param {String} message human readable error.
     * @param {Error} [err] the original error, if there is one.
     *
     * @returns {Error}
     */
    function makeError(id, msg, err, requireModules) {
        var e = new Error(msg + '\nhttp://requirejs.org/docs/errors.html#' + id);
        e.requireType = id;
        e.requireModules = requireModules;
        if (err) {
            e.originalError = err;
        }
        return e;
    }

    if (typeof define !== 'undefined') {
        //If a define is already in play via another AMD loader,
        //do not overwrite.
        return;
    }

    if (typeof requirejs !== 'undefined') {
        if (isFunction(requirejs)) {
            //Do not overwrite and existing requirejs instance.
            return;
        }
        cfg = requirejs;
        requirejs = undefined;
    }

    //Allow for a require config object
    if (typeof require !== 'undefined' && !isFunction(require)) {
        //assume it is a config object.
        cfg = require;
        require = undefined;
    }

    function newContext(contextName) {
        var inCheckLoaded, Module, context, handlers,
            checkLoadedTimeoutId,
            config = {
                //Defaults. Do not set a default for map
                //config to speed up normalize(), which
                //will run faster if there is no default.
                waitSeconds: 7,
                baseUrl: './',
                paths: {},
                pkgs: {},
                shim: {},
                config: {}
            },
            registry = {},
            //registry of just enabled modules, to speed
            //cycle breaking code when lots of modules
            //are registered, but not activated.
            enabledRegistry = {},
            undefEvents = {},
            defQueue = [],
            defined = {},
            urlFetched = {},
            requireCounter = 1,
            unnormalizedCounter = 1;

        /**
         * Trims the . and .. from an array of path segments.
         * It will keep a leading path segment if a .. will become
         * the first path segment, to help with module name lookups,
         * which act like paths, but can be remapped. But the end result,
         * all paths that use this function should look normalized.
         * NOTE: this method MODIFIES the input array.
         * @param {Array} ary the array of path segments.
         */
        function trimDots(ary) {
            var i, part;
            for (i = 0; ary[i]; i += 1) {
                part = ary[i];
                if (part === '.') {
                    ary.splice(i, 1);
                    i -= 1;
                } else if (part === '..') {
                    if (i === 1 && (ary[2] === '..' || ary[0] === '..')) {
                        //End of the line. Keep at least one non-dot
                        //path segment at the front so it can be mapped
                        //correctly to disk. Otherwise, there is likely
                        //no path mapping for a path starting with '..'.
                        //This can still fail, but catches the most reasonable
                        //uses of ..
                        break;
                    } else if (i > 0) {
                        ary.splice(i - 1, 2);
                        i -= 2;
                    }
                }
            }
        }

        /**
         * Given a relative module name, like ./something, normalize it to
         * a real name that can be mapped to a path.
         * @param {String} name the relative name
         * @param {String} baseName a real name that the name arg is relative
         * to.
         * @param {Boolean} applyMap apply the map config to the value. Should
         * only be done if this normalization is for a dependency ID.
         * @returns {String} normalized name
         */
        function normalize(name, baseName, applyMap) {
            var pkgName, pkgConfig, mapValue, nameParts, i, j, nameSegment,
                foundMap, foundI, foundStarMap, starI,
                baseParts = baseName && baseName.split('/'),
                normalizedBaseParts = baseParts,
                map = config.map,
                starMap = map && map['*'];

            //Adjust any relative paths.
            if (name && name.charAt(0) === '.') {
                //If have a base name, try to normalize against it,
                //otherwise, assume it is a top-level require that will
                //be relative to baseUrl in the end.
                if (baseName) {
                    if (getOwn(config.pkgs, baseName)) {
                        //If the baseName is a package name, then just treat it as one
                        //name to concat the name with.
                        normalizedBaseParts = baseParts = [baseName];
                    } else {
                        //Convert baseName to array, and lop off the last part,
                        //so that . matches that 'directory' and not name of the baseName's
                        //module. For instance, baseName of 'one/two/three', maps to
                        //'one/two/three.js', but we want the directory, 'one/two' for
                        //this normalization.
                        normalizedBaseParts = baseParts.slice(0, baseParts.length - 1);
                    }

                    name = normalizedBaseParts.concat(name.split('/'));
                    trimDots(name);

                    //Some use of packages may use a . path to reference the
                    //'main' module name, so normalize for that.
                    pkgConfig = getOwn(config.pkgs, (pkgName = name[0]));
                    name = name.join('/');
                    if (pkgConfig && name === pkgName + '/' + pkgConfig.main) {
                        name = pkgName;
                    }
                } else if (name.indexOf('./') === 0) {
                    // No baseName, so this is ID is resolved relative
                    // to baseUrl, pull off the leading dot.
                    name = name.substring(2);
                }
            }

            //Apply map config if available.
            if (applyMap && map && (baseParts || starMap)) {
                nameParts = name.split('/');

                for (i = nameParts.length; i > 0; i -= 1) {
                    nameSegment = nameParts.slice(0, i).join('/');

                    if (baseParts) {
                        //Find the longest baseName segment match in the config.
                        //So, do joins on the biggest to smallest lengths of baseParts.
                        for (j = baseParts.length; j > 0; j -= 1) {
                            mapValue = getOwn(map, baseParts.slice(0, j).join('/'));

                            //baseName segment has config, find if it has one for
                            //this name.
                            if (mapValue) {
                                mapValue = getOwn(mapValue, nameSegment);
                                if (mapValue) {
                                    //Match, update name to the new value.
                                    foundMap = mapValue;
                                    foundI = i;
                                    break;
                                }
                            }
                        }
                    }

                    if (foundMap) {
                        break;
                    }

                    //Check for a star map match, but just hold on to it,
                    //if there is a shorter segment match later in a matching
                    //config, then favor over this star map.
                    if (!foundStarMap && starMap && getOwn(starMap, nameSegment)) {
                        foundStarMap = getOwn(starMap, nameSegment);
                        starI = i;
                    }
                }

                if (!foundMap && foundStarMap) {
                    foundMap = foundStarMap;
                    foundI = starI;
                }

                if (foundMap) {
                    nameParts.splice(0, foundI, foundMap);
                    name = nameParts.join('/');
                }
            }

            return name;
        }

        function removeScript(name) {
            if (isBrowser) {
                each(scripts(), function (scriptNode) {
                    if (scriptNode.getAttribute('data-requiremodule') === name &&
                            scriptNode.getAttribute('data-requirecontext') === context.contextName) {
                        scriptNode.parentNode.removeChild(scriptNode);
                        return true;
                    }
                });
            }
        }

        function hasPathFallback(id) {
            var pathConfig = getOwn(config.paths, id);
            if (pathConfig && isArray(pathConfig) && pathConfig.length > 1) {
                removeScript(id);
                //Pop off the first array value, since it failed, and
                //retry
                pathConfig.shift();
                context.require.undef(id);
                context.require([id]);
                return true;
            }
        }

        //Turns a plugin!resource to [plugin, resource]
        //with the plugin being undefined if the name
        //did not have a plugin prefix.
        function splitPrefix(name) {
            var prefix,
                index = name ? name.indexOf('!') : -1;
            if (index > -1) {
                prefix = name.substring(0, index);
                name = name.substring(index + 1, name.length);
            }
            return [prefix, name];
        }

        /**
         * Creates a module mapping that includes plugin prefix, module
         * name, and path. If parentModuleMap is provided it will
         * also normalize the name via require.normalize()
         *
         * @param {String} name the module name
         * @param {String} [parentModuleMap] parent module map
         * for the module name, used to resolve relative names.
         * @param {Boolean} isNormalized: is the ID already normalized.
         * This is true if this call is done for a define() module ID.
         * @param {Boolean} applyMap: apply the map config to the ID.
         * Should only be true if this map is for a dependency.
         *
         * @returns {Object}
         */
        function makeModuleMap(name, parentModuleMap, isNormalized, applyMap) {
            var url, pluginModule, suffix, nameParts,
                prefix = null,
                parentName = parentModuleMap ? parentModuleMap.name : null,
                originalName = name,
                isDefine = true,
                normalizedName = '';

            //If no name, then it means it is a require call, generate an
            //internal name.
            if (!name) {
                isDefine = false;
                name = '_@r' + (requireCounter += 1);
            }

            nameParts = splitPrefix(name);
            prefix = nameParts[0];
            name = nameParts[1];

            if (prefix) {
                prefix = normalize(prefix, parentName, applyMap);
                pluginModule = getOwn(defined, prefix);
            }

            //Account for relative paths if there is a base name.
            if (name) {
                if (prefix) {
                    if (pluginModule && pluginModule.normalize) {
                        //Plugin is loaded, use its normalize method.
                        normalizedName = pluginModule.normalize(name, function (name) {
                            return normalize(name, parentName, applyMap);
                        });
                    } else {
                        normalizedName = normalize(name, parentName, applyMap);
                    }
                } else {
                    //A regular module.
                    normalizedName = normalize(name, parentName, applyMap);

                    //Normalized name may be a plugin ID due to map config
                    //application in normalize. The map config values must
                    //already be normalized, so do not need to redo that part.
                    nameParts = splitPrefix(normalizedName);
                    prefix = nameParts[0];
                    normalizedName = nameParts[1];
                    isNormalized = true;

                    url = context.nameToUrl(normalizedName);
                }
            }

            //If the id is a plugin id that cannot be determined if it needs
            //normalization, stamp it with a unique ID so two matching relative
            //ids that may conflict can be separate.
            suffix = prefix && !pluginModule && !isNormalized ?
                     '_unnormalized' + (unnormalizedCounter += 1) :
                     '';

            return {
                prefix: prefix,
                name: normalizedName,
                parentMap: parentModuleMap,
                unnormalized: !!suffix,
                url: url,
                originalName: originalName,
                isDefine: isDefine,
                id: (prefix ?
                        prefix + '!' + normalizedName :
                        normalizedName) + suffix
            };
        }

        function getModule(depMap) {
            var id = depMap.id,
                mod = getOwn(registry, id);

            if (!mod) {
                mod = registry[id] = new context.Module(depMap);
            }

            return mod;
        }

        function on(depMap, name, fn) {
            var id = depMap.id,
                mod = getOwn(registry, id);

            if (hasProp(defined, id) &&
                    (!mod || mod.defineEmitComplete)) {
                if (name === 'defined') {
                    fn(defined[id]);
                }
            } else {
                getModule(depMap).on(name, fn);
            }
        }

        function onError(err, errback) {
            var ids = err.requireModules,
                notified = false;

            if (errback) {
                errback(err);
            } else {
                each(ids, function (id) {
                    var mod = getOwn(registry, id);
                    if (mod) {
                        //Set error on module, so it skips timeout checks.
                        mod.error = err;
                        if (mod.events.error) {
                            notified = true;
                            mod.emit('error', err);
                        }
                    }
                });

                if (!notified) {
                    req.onError(err);
                }
            }
        }

        /**
         * Internal method to transfer globalQueue items to this context's
         * defQueue.
         */
        function takeGlobalQueue() {
            //Push all the globalDefQueue items into the context's defQueue
            if (globalDefQueue.length) {
                //Array splice in the values since the context code has a
                //local var ref to defQueue, so cannot just reassign the one
                //on context.
                apsp.apply(defQueue,
                           [defQueue.length - 1, 0].concat(globalDefQueue));
                globalDefQueue = [];
            }
        }

        handlers = {
            'require': function (mod) {
                if (mod.require) {
                    return mod.require;
                } else {
                    return (mod.require = context.makeRequire(mod.map));
                }
            },
            'exports': function (mod) {
                mod.usingExports = true;
                if (mod.map.isDefine) {
                    if (mod.exports) {
                        return mod.exports;
                    } else {
                        return (mod.exports = defined[mod.map.id] = {});
                    }
                }
            },
            'module': function (mod) {
                if (mod.module) {
                    return mod.module;
                } else {
                    return (mod.module = {
                        id: mod.map.id,
                        uri: mod.map.url,
                        config: function () {
                            return (config.config && getOwn(config.config, mod.map.id)) || {};
                        },
                        exports: defined[mod.map.id]
                    });
                }
            }
        };

        function cleanRegistry(id) {
            //Clean up machinery used for waiting modules.
            delete registry[id];
            delete enabledRegistry[id];
        }

        function breakCycle(mod, traced, processed) {
            var id = mod.map.id;

            if (mod.error) {
                mod.emit('error', mod.error);
            } else {
                traced[id] = true;
                each(mod.depMaps, function (depMap, i) {
                    var depId = depMap.id,
                        dep = getOwn(registry, depId);

                    //Only force things that have not completed
                    //being defined, so still in the registry,
                    //and only if it has not been matched up
                    //in the module already.
                    if (dep && !mod.depMatched[i] && !processed[depId]) {
                        if (getOwn(traced, depId)) {
                            mod.defineDep(i, defined[depId]);
                            mod.check(); //pass false?
                        } else {
                            breakCycle(dep, traced, processed);
                        }
                    }
                });
                processed[id] = true;
            }
        }

        function checkLoaded() {
            var map, modId, err, usingPathFallback,
                waitInterval = config.waitSeconds * 1000,
                //It is possible to disable the wait interval by using waitSeconds of 0.
                expired = waitInterval && (context.startTime + waitInterval) < new Date().getTime(),
                noLoads = [],
                reqCalls = [],
                stillLoading = false,
                needCycleCheck = true;

            //Do not bother if this call was a result of a cycle break.
            if (inCheckLoaded) {
                return;
            }

            inCheckLoaded = true;

            //Figure out the state of all the modules.
            eachProp(enabledRegistry, function (mod) {
                map = mod.map;
                modId = map.id;

                //Skip things that are not enabled or in error state.
                if (!mod.enabled) {
                    return;
                }

                if (!map.isDefine) {
                    reqCalls.push(mod);
                }

                if (!mod.error) {
                    //If the module should be executed, and it has not
                    //been inited and time is up, remember it.
                    if (!mod.inited && expired) {
                        if (hasPathFallback(modId)) {
                            usingPathFallback = true;
                            stillLoading = true;
                        } else {
                            noLoads.push(modId);
                            removeScript(modId);
                        }
                    } else if (!mod.inited && mod.fetched && map.isDefine) {
                        stillLoading = true;
                        if (!map.prefix) {
                            //No reason to keep looking for unfinished
                            //loading. If the only stillLoading is a
                            //plugin resource though, keep going,
                            //because it may be that a plugin resource
                            //is waiting on a non-plugin cycle.
                            return (needCycleCheck = false);
                        }
                    }
                }
            });

            if (expired && noLoads.length) {
                //If wait time expired, throw error of unloaded modules.
                err = makeError('timeout', 'Load timeout for modules: ' + noLoads, null, noLoads);
                err.contextName = context.contextName;
                return onError(err);
            }

            //Not expired, check for a cycle.
            if (needCycleCheck) {
                each(reqCalls, function (mod) {
                    breakCycle(mod, {}, {});
                });
            }

            //If still waiting on loads, and the waiting load is something
            //other than a plugin resource, or there are still outstanding
            //scripts, then just try back later.
            if ((!expired || usingPathFallback) && stillLoading) {
                //Something is still waiting to load. Wait for it, but only
                //if a timeout is not already in effect.
                if ((isBrowser || isWebWorker) && !checkLoadedTimeoutId) {
                    checkLoadedTimeoutId = setTimeout(function () {
                        checkLoadedTimeoutId = 0;
                        checkLoaded();
                    }, 50);
                }
            }

            inCheckLoaded = false;
        }

        Module = function (map) {
            this.events = getOwn(undefEvents, map.id) || {};
            this.map = map;
            this.shim = getOwn(config.shim, map.id);
            this.depExports = [];
            this.depMaps = [];
            this.depMatched = [];
            this.pluginMaps = {};
            this.depCount = 0;

            /* this.exports this.factory
               this.depMaps = [],
               this.enabled, this.fetched
            */
        };

        Module.prototype = {
            init: function (depMaps, factory, errback, options) {
                options = options || {};

                //Do not do more inits if already done. Can happen if there
                //are multiple define calls for the same module. That is not
                //a normal, common case, but it is also not unexpected.
                if (this.inited) {
                    return;
                }

                this.factory = factory;

                if (errback) {
                    //Register for errors on this module.
                    this.on('error', errback);
                } else if (this.events.error) {
                    //If no errback already, but there are error listeners
                    //on this module, set up an errback to pass to the deps.
                    errback = bind(this, function (err) {
                        this.emit('error', err);
                    });
                }

                //Do a copy of the dependency array, so that
                //source inputs are not modified. For example
                //"shim" deps are passed in here directly, and
                //doing a direct modification of the depMaps array
                //would affect that config.
                this.depMaps = depMaps && depMaps.slice(0);

                this.errback = errback;

                //Indicate this module has be initialized
                this.inited = true;

                this.ignore = options.ignore;

                //Could have option to init this module in enabled mode,
                //or could have been previously marked as enabled. However,
                //the dependencies are not known until init is called. So
                //if enabled previously, now trigger dependencies as enabled.
                if (options.enabled || this.enabled) {
                    //Enable this module and dependencies.
                    //Will call this.check()
                    this.enable();
                } else {
                    this.check();
                }
            },

            defineDep: function (i, depExports) {
                //Because of cycles, defined callback for a given
                //export can be called more than once.
                if (!this.depMatched[i]) {
                    this.depMatched[i] = true;
                    this.depCount -= 1;
                    this.depExports[i] = depExports;
                }
            },

            fetch: function () {
                if (this.fetched) {
                    return;
                }
                this.fetched = true;

                context.startTime = (new Date()).getTime();

                var map = this.map;

                //If the manager is for a plugin managed resource,
                //ask the plugin to load it now.
                if (this.shim) {
                    context.makeRequire(this.map, {
                        enableBuildCallback: true
                    })(this.shim.deps || [], bind(this, function () {
                        return map.prefix ? this.callPlugin() : this.load();
                    }));
                } else {
                    //Regular dependency.
                    return map.prefix ? this.callPlugin() : this.load();
                }
            },

            load: function () {
                var url = this.map.url;

                //Regular dependency.
                if (!urlFetched[url]) {
                    urlFetched[url] = true;
                    context.load(this.map.id, url);
                }
            },

            /**
             * Checks if the module is ready to define itself, and if so,
             * define it.
             */
            check: function () {
                if (!this.enabled || this.enabling) {
                    return;
                }

                var err, cjsModule,
                    id = this.map.id,
                    depExports = this.depExports,
                    exports = this.exports,
                    factory = this.factory;

                if (!this.inited) {
                    this.fetch();
                } else if (this.error) {
                    this.emit('error', this.error);
                } else if (!this.defining) {
                    //The factory could trigger another require call
                    //that would result in checking this module to
                    //define itself again. If already in the process
                    //of doing that, skip this work.
                    this.defining = true;

                    if (this.depCount < 1 && !this.defined) {
                        if (isFunction(factory)) {
                            //If there is an error listener, favor passing
                            //to that instead of throwing an error.
                            if (this.events.error) {
                                try {
                                    exports = context.execCb(id, factory, depExports, exports);
                                } catch (e) {
                                    err = e;
                                }
                            } else {
                                exports = context.execCb(id, factory, depExports, exports);
                            }

                            if (this.map.isDefine) {
                                //If setting exports via 'module' is in play,
                                //favor that over return value and exports. After that,
                                //favor a non-undefined return value over exports use.
                                cjsModule = this.module;
                                if (cjsModule &&
                                        cjsModule.exports !== undefined &&
                                        //Make sure it is not already the exports value
                                        cjsModule.exports !== this.exports) {
                                    exports = cjsModule.exports;
                                } else if (exports === undefined && this.usingExports) {
                                    //exports already set the defined value.
                                    exports = this.exports;
                                }
                            }

                            if (err) {
                                err.requireMap = this.map;
                                err.requireModules = [this.map.id];
                                err.requireType = 'define';
                                return onError((this.error = err));
                            }

                        } else {
                            //Just a literal value
                            exports = factory;
                        }

                        this.exports = exports;

                        if (this.map.isDefine && !this.ignore) {
                            defined[id] = exports;

                            if (req.onResourceLoad) {
                                req.onResourceLoad(context, this.map, this.depMaps);
                            }
                        }

                        //Clean up
                        cleanRegistry(id);

                        this.defined = true;
                    }

                    //Finished the define stage. Allow calling check again
                    //to allow define notifications below in the case of a
                    //cycle.
                    this.defining = false;

                    if (this.defined && !this.defineEmitted) {
                        this.defineEmitted = true;
                        this.emit('defined', this.exports);
                        this.defineEmitComplete = true;
                    }

                }
            },

            callPlugin: function () {
                var map = this.map,
                    id = map.id,
                    //Map already normalized the prefix.
                    pluginMap = makeModuleMap(map.prefix);

                //Mark this as a dependency for this plugin, so it
                //can be traced for cycles.
                this.depMaps.push(pluginMap);

                on(pluginMap, 'defined', bind(this, function (plugin) {
                    var load, normalizedMap, normalizedMod,
                        name = this.map.name,
                        parentName = this.map.parentMap ? this.map.parentMap.name : null,
                        localRequire = context.makeRequire(map.parentMap, {
                            enableBuildCallback: true
                        });

                    //If current map is not normalized, wait for that
                    //normalized name to load instead of continuing.
                    if (this.map.unnormalized) {
                        //Normalize the ID if the plugin allows it.
                        if (plugin.normalize) {
                            name = plugin.normalize(name, function (name) {
                                return normalize(name, parentName, true);
                            }) || '';
                        }

                        //prefix and name should already be normalized, no need
                        //for applying map config again either.
                        normalizedMap = makeModuleMap(map.prefix + '!' + name,
                                                      this.map.parentMap);
                        on(normalizedMap,
                            'defined', bind(this, function (value) {
                                this.init([], function () { return value; }, null, {
                                    enabled: true,
                                    ignore: true
                                });
                            }));

                        normalizedMod = getOwn(registry, normalizedMap.id);
                        if (normalizedMod) {
                            //Mark this as a dependency for this plugin, so it
                            //can be traced for cycles.
                            this.depMaps.push(normalizedMap);

                            if (this.events.error) {
                                normalizedMod.on('error', bind(this, function (err) {
                                    this.emit('error', err);
                                }));
                            }
                            normalizedMod.enable();
                        }

                        return;
                    }

                    load = bind(this, function (value) {
                        this.init([], function () { return value; }, null, {
                            enabled: true
                        });
                    });

                    load.error = bind(this, function (err) {
                        this.inited = true;
                        this.error = err;
                        err.requireModules = [id];

                        //Remove temp unnormalized modules for this module,
                        //since they will never be resolved otherwise now.
                        eachProp(registry, function (mod) {
                            if (mod.map.id.indexOf(id + '_unnormalized') === 0) {
                                cleanRegistry(mod.map.id);
                            }
                        });

                        onError(err);
                    });

                    //Allow plugins to load other code without having to know the
                    //context or how to 'complete' the load.
                    load.fromText = bind(this, function (text, textAlt) {
                        /*jslint evil: true */
                        var moduleName = map.name,
                            moduleMap = makeModuleMap(moduleName),
                            hasInteractive = useInteractive;

                        //As of 2.1.0, support just passing the text, to reinforce
                        //fromText only being called once per resource. Still
                        //support old style of passing moduleName but discard
                        //that moduleName in favor of the internal ref.
                        if (textAlt) {
                            text = textAlt;
                        }

                        //Turn off interactive script matching for IE for any define
                        //calls in the text, then turn it back on at the end.
                        if (hasInteractive) {
                            useInteractive = false;
                        }

                        //Prime the system by creating a module instance for
                        //it.
                        getModule(moduleMap);

                        //Transfer any config to this other module.
                        if (hasProp(config.config, id)) {
                            config.config[moduleName] = config.config[id];
                        }

                        try {
                            req.exec(text);
                        } catch (e) {
                            return onError(makeError('fromtexteval',
                                             'fromText eval for ' + id +
                                            ' failed: ' + e,
                                             e,
                                             [id]));
                        }

                        if (hasInteractive) {
                            useInteractive = true;
                        }

                        //Mark this as a dependency for the plugin
                        //resource
                        this.depMaps.push(moduleMap);

                        //Support anonymous modules.
                        context.completeLoad(moduleName);

                        //Bind the value of that module to the value for this
                        //resource ID.
                        localRequire([moduleName], load);
                    });

                    //Use parentName here since the plugin's name is not reliable,
                    //could be some weird string with no path that actually wants to
                    //reference the parentName's path.
                    plugin.load(map.name, localRequire, load, config);
                }));

                context.enable(pluginMap, this);
                this.pluginMaps[pluginMap.id] = pluginMap;
            },

            enable: function () {
                enabledRegistry[this.map.id] = this;
                this.enabled = true;

                //Set flag mentioning that the module is enabling,
                //so that immediate calls to the defined callbacks
                //for dependencies do not trigger inadvertent load
                //with the depCount still being zero.
                this.enabling = true;

                //Enable each dependency
                each(this.depMaps, bind(this, function (depMap, i) {
                    var id, mod, handler;

                    if (typeof depMap === 'string') {
                        //Dependency needs to be converted to a depMap
                        //and wired up to this module.
                        depMap = makeModuleMap(depMap,
                                               (this.map.isDefine ? this.map : this.map.parentMap),
                                               false,
                                               !this.skipMap);
                        this.depMaps[i] = depMap;

                        handler = getOwn(handlers, depMap.id);

                        if (handler) {
                            this.depExports[i] = handler(this);
                            return;
                        }

                        this.depCount += 1;

                        on(depMap, 'defined', bind(this, function (depExports) {
                            this.defineDep(i, depExports);
                            this.check();
                        }));

                        if (this.errback) {
                            on(depMap, 'error', this.errback);
                        }
                    }

                    id = depMap.id;
                    mod = registry[id];

                    //Skip special modules like 'require', 'exports', 'module'
                    //Also, don't call enable if it is already enabled,
                    //important in circular dependency cases.
                    if (!hasProp(handlers, id) && mod && !mod.enabled) {
                        context.enable(depMap, this);
                    }
                }));

                //Enable each plugin that is used in
                //a dependency
                eachProp(this.pluginMaps, bind(this, function (pluginMap) {
                    var mod = getOwn(registry, pluginMap.id);
                    if (mod && !mod.enabled) {
                        context.enable(pluginMap, this);
                    }
                }));

                this.enabling = false;

                this.check();
            },

            on: function (name, cb) {
                var cbs = this.events[name];
                if (!cbs) {
                    cbs = this.events[name] = [];
                }
                cbs.push(cb);
            },

            emit: function (name, evt) {
                each(this.events[name], function (cb) {
                    cb(evt);
                });
                if (name === 'error') {
                    //Now that the error handler was triggered, remove
                    //the listeners, since this broken Module instance
                    //can stay around for a while in the registry.
                    delete this.events[name];
                }
            }
        };

        function callGetModule(args) {
            //Skip modules already defined.
            if (!hasProp(defined, args[0])) {
                getModule(makeModuleMap(args[0], null, true)).init(args[1], args[2]);
            }
        }

        function removeListener(node, func, name, ieName) {
            //Favor detachEvent because of IE9
            //issue, see attachEvent/addEventListener comment elsewhere
            //in this file.
            if (node.detachEvent && !isOpera) {
                //Probably IE. If not it will throw an error, which will be
                //useful to know.
                if (ieName) {
                    node.detachEvent(ieName, func);
                }
            } else {
                node.removeEventListener(name, func, false);
            }
        }

        /**
         * Given an event from a script node, get the requirejs info from it,
         * and then removes the event listeners on the node.
         * @param {Event} evt
         * @returns {Object}
         */
        function getScriptData(evt) {
            //Using currentTarget instead of target for Firefox 2.0's sake. Not
            //all old browsers will be supported, but this one was easy enough
            //to support and still makes sense.
            var node = evt.currentTarget || evt.srcElement;

            //Remove the listeners once here.
            removeListener(node, context.onScriptLoad, 'load', 'onreadystatechange');
            removeListener(node, context.onScriptError, 'error');

            return {
                node: node,
                id: node && node.getAttribute('data-requiremodule')
            };
        }

        function intakeDefines() {
            var args;

            //Any defined modules in the global queue, intake them now.
            takeGlobalQueue();

            //Make sure any remaining defQueue items get properly processed.
            while (defQueue.length) {
                args = defQueue.shift();
                if (args[0] === null) {
                    return onError(makeError('mismatch', 'Mismatched anonymous define() module: ' + args[args.length - 1]));
                } else {
                    //args are id, deps, factory. Should be normalized by the
                    //define() function.
                    callGetModule(args);
                }
            }
        }

        context = {
            config: config,
            contextName: contextName,
            registry: registry,
            defined: defined,
            urlFetched: urlFetched,
            defQueue: defQueue,
            Module: Module,
            makeModuleMap: makeModuleMap,
            nextTick: req.nextTick,
            onError: onError,

            /**
             * Set a configuration for the context.
             * @param {Object} cfg config object to integrate.
             */
            configure: function (cfg) {
                //Make sure the baseUrl ends in a slash.
                if (cfg.baseUrl) {
                    if (cfg.baseUrl.charAt(cfg.baseUrl.length - 1) !== '/') {
                        cfg.baseUrl += '/';
                    }
                }

                //Save off the paths and packages since they require special processing,
                //they are additive.
                var pkgs = config.pkgs,
                    shim = config.shim,
                    objs = {
                        paths: true,
                        config: true,
                        map: true
                    };

                eachProp(cfg, function (value, prop) {
                    if (objs[prop]) {
                        if (prop === 'map') {
                            if (!config.map) {
                                config.map = {};
                            }
                            mixin(config[prop], value, true, true);
                        } else {
                            mixin(config[prop], value, true);
                        }
                    } else {
                        config[prop] = value;
                    }
                });

                //Merge shim
                if (cfg.shim) {
                    eachProp(cfg.shim, function (value, id) {
                        //Normalize the structure
                        if (isArray(value)) {
                            value = {
                                deps: value
                            };
                        }
                        if ((value.exports || value.init) && !value.exportsFn) {
                            value.exportsFn = context.makeShimExports(value);
                        }
                        shim[id] = value;
                    });
                    config.shim = shim;
                }

                //Adjust packages if necessary.
                if (cfg.packages) {
                    each(cfg.packages, function (pkgObj) {
                        var location;

                        pkgObj = typeof pkgObj === 'string' ? { name: pkgObj } : pkgObj;
                        location = pkgObj.location;

                        //Create a brand new object on pkgs, since currentPackages can
                        //be passed in again, and config.pkgs is the internal transformed
                        //state for all package configs.
                        pkgs[pkgObj.name] = {
                            name: pkgObj.name,
                            location: location || pkgObj.name,
                            //Remove leading dot in main, so main paths are normalized,
                            //and remove any trailing .js, since different package
                            //envs have different conventions: some use a module name,
                            //some use a file name.
                            main: (pkgObj.main || 'main')
                                  .replace(currDirRegExp, '')
                                  .replace(jsSuffixRegExp, '')
                        };
                    });

                    //Done with modifications, assing packages back to context config
                    config.pkgs = pkgs;
                }

                //If there are any "waiting to execute" modules in the registry,
                //update the maps for them, since their info, like URLs to load,
                //may have changed.
                eachProp(registry, function (mod, id) {
                    //If module already has init called, since it is too
                    //late to modify them, and ignore unnormalized ones
                    //since they are transient.
                    if (!mod.inited && !mod.map.unnormalized) {
                        mod.map = makeModuleMap(id);
                    }
                });

                //If a deps array or a config callback is specified, then call
                //require with those args. This is useful when require is defined as a
                //config object before require.js is loaded.
                if (cfg.deps || cfg.callback) {
                    context.require(cfg.deps || [], cfg.callback);
                }
            },

            makeShimExports: function (value) {
                function fn() {
                    var ret;
                    if (value.init) {
                        ret = value.init.apply(global, arguments);
                    }
                    return ret || (value.exports && getGlobal(value.exports));
                }
                return fn;
            },

            makeRequire: function (relMap, options) {
                options = options || {};

                function localRequire(deps, callback, errback) {
                    var id, map, requireMod;

                    if (options.enableBuildCallback && callback && isFunction(callback)) {
                        callback.__requireJsBuild = true;
                    }

                    if (typeof deps === 'string') {
                        if (isFunction(callback)) {
                            //Invalid call
                            return onError(makeError('requireargs', 'Invalid require call'), errback);
                        }

                        //If require|exports|module are requested, get the
                        //value for them from the special handlers. Caveat:
                        //this only works while module is being defined.
                        if (relMap && hasProp(handlers, deps)) {
                            return handlers[deps](registry[relMap.id]);
                        }

                        //Synchronous access to one module. If require.get is
                        //available (as in the Node adapter), prefer that.
                        if (req.get) {
                            return req.get(context, deps, relMap, localRequire);
                        }

                        //Normalize module name, if it contains . or ..
                        map = makeModuleMap(deps, relMap, false, true);
                        id = map.id;

                        if (!hasProp(defined, id)) {
                            return onError(makeError('notloaded', 'Module name "' +
                                        id +
                                        '" has not been loaded yet for context: ' +
                                        contextName +
                                        (relMap ? '' : '. Use require([])')));
                        }
                        return defined[id];
                    }

                    //Grab defines waiting in the global queue.
                    intakeDefines();

                    //Mark all the dependencies as needing to be loaded.
                    context.nextTick(function () {
                        //Some defines could have been added since the
                        //require call, collect them.
                        intakeDefines();

                        requireMod = getModule(makeModuleMap(null, relMap));

                        //Store if map config should be applied to this require
                        //call for dependencies.
                        requireMod.skipMap = options.skipMap;

                        requireMod.init(deps, callback, errback, {
                            enabled: true
                        });

                        checkLoaded();
                    });

                    return localRequire;
                }

                mixin(localRequire, {
                    isBrowser: isBrowser,

                    /**
                     * Converts a module name + .extension into an URL path.
                     * *Requires* the use of a module name. It does not support using
                     * plain URLs like nameToUrl.
                     */
                    toUrl: function (moduleNamePlusExt) {
                        var ext,
                            index = moduleNamePlusExt.lastIndexOf('.'),
                            segment = moduleNamePlusExt.split('/')[0],
                            isRelative = segment === '.' || segment === '..';

                        //Have a file extension alias, and it is not the
                        //dots from a relative path.
                        if (index !== -1 && (!isRelative || index > 1)) {
                            ext = moduleNamePlusExt.substring(index, moduleNamePlusExt.length);
                            moduleNamePlusExt = moduleNamePlusExt.substring(0, index);
                        }

                        return context.nameToUrl(normalize(moduleNamePlusExt,
                                                relMap && relMap.id, true), ext,  true);
                    },

                    defined: function (id) {
                        return hasProp(defined, makeModuleMap(id, relMap, false, true).id);
                    },

                    specified: function (id) {
                        id = makeModuleMap(id, relMap, false, true).id;
                        return hasProp(defined, id) || hasProp(registry, id);
                    }
                });

                //Only allow undef on top level require calls
                if (!relMap) {
                    localRequire.undef = function (id) {
                        //Bind any waiting define() calls to this context,
                        //fix for #408
                        takeGlobalQueue();

                        var map = makeModuleMap(id, relMap, true),
                            mod = getOwn(registry, id);

                        delete defined[id];
                        delete urlFetched[map.url];
                        delete undefEvents[id];

                        if (mod) {
                            //Hold on to listeners in case the
                            //module will be attempted to be reloaded
                            //using a different config.
                            if (mod.events.defined) {
                                undefEvents[id] = mod.events;
                            }

                            cleanRegistry(id);
                        }
                    };
                }

                return localRequire;
            },

            /**
             * Called to enable a module if it is still in the registry
             * awaiting enablement. A second arg, parent, the parent module,
             * is passed in for context, when this method is overriden by
             * the optimizer. Not shown here to keep code compact.
             */
            enable: function (depMap) {
                var mod = getOwn(registry, depMap.id);
                if (mod) {
                    getModule(depMap).enable();
                }
            },

            /**
             * Internal method used by environment adapters to complete a load event.
             * A load event could be a script load or just a load pass from a synchronous
             * load call.
             * @param {String} moduleName the name of the module to potentially complete.
             */
            completeLoad: function (moduleName) {
                var found, args, mod,
                    shim = getOwn(config.shim, moduleName) || {},
                    shExports = shim.exports;

                takeGlobalQueue();

                while (defQueue.length) {
                    args = defQueue.shift();
                    if (args[0] === null) {
                        args[0] = moduleName;
                        //If already found an anonymous module and bound it
                        //to this name, then this is some other anon module
                        //waiting for its completeLoad to fire.
                        if (found) {
                            break;
                        }
                        found = true;
                    } else if (args[0] === moduleName) {
                        //Found matching define call for this script!
                        found = true;
                    }

                    callGetModule(args);
                }

                //Do this after the cycle of callGetModule in case the result
                //of those calls/init calls changes the registry.
                mod = getOwn(registry, moduleName);

                if (!found && !hasProp(defined, moduleName) && mod && !mod.inited) {
                    if (config.enforceDefine && (!shExports || !getGlobal(shExports))) {
                        if (hasPathFallback(moduleName)) {
                            return;
                        } else {
                            return onError(makeError('nodefine',
                                             'No define call for ' + moduleName,
                                             null,
                                             [moduleName]));
                        }
                    } else {
                        //A script that does not call define(), so just simulate
                        //the call for it.
                        callGetModule([moduleName, (shim.deps || []), shim.exportsFn]);
                    }
                }

                checkLoaded();
            },

            /**
             * Converts a module name to a file path. Supports cases where
             * moduleName may actually be just an URL.
             * Note that it **does not** call normalize on the moduleName,
             * it is assumed to have already been normalized. This is an
             * internal API, not a public one. Use toUrl for the public API.
             */
            nameToUrl: function (moduleName, ext, skipExt) {
                var paths, pkgs, pkg, pkgPath, syms, i, parentModule, url,
                    parentPath;

                //If a colon is in the URL, it indicates a protocol is used and it is just
                //an URL to a file, or if it starts with a slash, contains a query arg (i.e. ?)
                //or ends with .js, then assume the user meant to use an url and not a module id.
                //The slash is important for protocol-less URLs as well as full paths.
                if (req.jsExtRegExp.test(moduleName)) {
                    //Just a plain path, not module name lookup, so just return it.
                    //Add extension if it is included. This is a bit wonky, only non-.js things pass
                    //an extension, this method probably needs to be reworked.
                    url = moduleName + (ext || '');
                } else {
                    //A module that needs to be converted to a path.
                    paths = config.paths;
                    pkgs = config.pkgs;

                    syms = moduleName.split('/');
                    //For each module name segment, see if there is a path
                    //registered for it. Start with most specific name
                    //and work up from it.
                    for (i = syms.length; i > 0; i -= 1) {
                        parentModule = syms.slice(0, i).join('/');
                        pkg = getOwn(pkgs, parentModule);
                        parentPath = getOwn(paths, parentModule);
                        if (parentPath) {
                            //If an array, it means there are a few choices,
                            //Choose the one that is desired
                            if (isArray(parentPath)) {
                                parentPath = parentPath[0];
                            }
                            syms.splice(0, i, parentPath);
                            break;
                        } else if (pkg) {
                            //If module name is just the package name, then looking
                            //for the main module.
                            if (moduleName === pkg.name) {
                                pkgPath = pkg.location + '/' + pkg.main;
                            } else {
                                pkgPath = pkg.location;
                            }
                            syms.splice(0, i, pkgPath);
                            break;
                        }
                    }

                    //Join the path parts together, then figure out if baseUrl is needed.
                    url = syms.join('/');
                    url += (ext || (/\?/.test(url) || skipExt ? '' : '.js'));
                    url = (url.charAt(0) === '/' || url.match(/^[\w\+\.\-]+:/) ? '' : config.baseUrl) + url;
                }

                return config.urlArgs ? url +
                                        ((url.indexOf('?') === -1 ? '?' : '&') +
                                         config.urlArgs) : url;
            },

            //Delegates to req.load. Broken out as a separate function to
            //allow overriding in the optimizer.
            load: function (id, url) {
                req.load(context, id, url);
            },

            /**
             * Executes a module callack function. Broken out as a separate function
             * solely to allow the build system to sequence the files in the built
             * layer in the right sequence.
             *
             * @private
             */
            execCb: function (name, callback, args, exports) {
                return callback.apply(exports, args);
            },

            /**
             * callback for script loads, used to check status of loading.
             *
             * @param {Event} evt the event from the browser for the script
             * that was loaded.
             */
            onScriptLoad: function (evt) {
                //Using currentTarget instead of target for Firefox 2.0's sake. Not
                //all old browsers will be supported, but this one was easy enough
                //to support and still makes sense.
                if (evt.type === 'load' ||
                        (readyRegExp.test((evt.currentTarget || evt.srcElement).readyState))) {
                    //Reset interactive script so a script node is not held onto for
                    //to long.
                    interactiveScript = null;

                    //Pull out the name of the module and the context.
                    var data = getScriptData(evt);
                    context.completeLoad(data.id);
                }
            },

            /**
             * Callback for script errors.
             */
            onScriptError: function (evt) {
                var data = getScriptData(evt);
                if (!hasPathFallback(data.id)) {
                    return onError(makeError('scripterror', 'Script error', evt, [data.id]));
                }
            }
        };

        context.require = context.makeRequire();
        return context;
    }

    /**
     * Main entry point.
     *
     * If the only argument to require is a string, then the module that
     * is represented by that string is fetched for the appropriate context.
     *
     * If the first argument is an array, then it will be treated as an array
     * of dependency string names to fetch. An optional function callback can
     * be specified to execute when all of those dependencies are available.
     *
     * Make a local req variable to help Caja compliance (it assumes things
     * on a require that are not standardized), and to give a short
     * name for minification/local scope use.
     */
    req = requirejs = function (deps, callback, errback, optional) {

        //Find the right context, use default
        var context, config,
            contextName = defContextName;

        // Determine if have config object in the call.
        if (!isArray(deps) && typeof deps !== 'string') {
            // deps is a config object
            config = deps;
            if (isArray(callback)) {
                // Adjust args if there are dependencies
                deps = callback;
                callback = errback;
                errback = optional;
            } else {
                deps = [];
            }
        }

        if (config && config.context) {
            contextName = config.context;
        }

        context = getOwn(contexts, contextName);
        if (!context) {
            context = contexts[contextName] = req.s.newContext(contextName);
        }

        if (config) {
            context.configure(config);
        }

        return context.require(deps, callback, errback);
    };

    /**
     * Support require.config() to make it easier to cooperate with other
     * AMD loaders on globally agreed names.
     */
    req.config = function (config) {
        return req(config);
    };

    /**
     * Execute something after the current tick
     * of the event loop. Override for other envs
     * that have a better solution than setTimeout.
     * @param  {Function} fn function to execute later.
     */
    req.nextTick = typeof setTimeout !== 'undefined' ? function (fn) {
        setTimeout(fn, 4);
    } : function (fn) { fn(); };

    /**
     * Export require as a global, but only if it does not already exist.
     */
    if (!require) {
        require = req;
    }

    req.version = version;

    //Used to filter out dependencies that are already paths.
    req.jsExtRegExp = /^\/|:|\?|\.js$/;
    req.isBrowser = isBrowser;
    s = req.s = {
        contexts: contexts,
        newContext: newContext
    };

    //Create default context.
    req({});

    //Exports some context-sensitive methods on global require.
    each([
        'toUrl',
        'undef',
        'defined',
        'specified'
    ], function (prop) {
        //Reference from contexts instead of early binding to default context,
        //so that during builds, the latest instance of the default context
        //with its config gets used.
        req[prop] = function () {
            var ctx = contexts[defContextName];
            return ctx.require[prop].apply(ctx, arguments);
        };
    });

    if (isBrowser) {
        head = s.head = document.getElementsByTagName('head')[0];
        //If BASE tag is in play, using appendChild is a problem for IE6.
        //When that browser dies, this can be removed. Details in this jQuery bug:
        //http://dev.jquery.com/ticket/2709
        baseElement = document.getElementsByTagName('base')[0];
        if (baseElement) {
            head = s.head = baseElement.parentNode;
        }
    }

    /**
     * Any errors that require explicitly generates will be passed to this
     * function. Intercept/override it if you want custom error handling.
     * @param {Error} err the error object.
     */
    req.onError = function (err) {
        throw err;
    };

    /**
     * Does the request to load a module for the browser case.
     * Make this a separate function to allow other environments
     * to override it.
     *
     * @param {Object} context the require context to find state.
     * @param {String} moduleName the name of the module.
     * @param {Object} url the URL to the module.
     */
    req.load = function (context, moduleName, url) {
        var config = (context && context.config) || {},
            node;
        if (isBrowser) {
            //In the browser so use a script tag
            node = config.xhtml ?
                    document.createElementNS('http://www.w3.org/1999/xhtml', 'html:script') :
                    document.createElement('script');
            node.type = config.scriptType || 'text/javascript';
            node.charset = 'utf-8';
            node.async = true;

            node.setAttribute('data-requirecontext', context.contextName);
            node.setAttribute('data-requiremodule', moduleName);

            //Set up load listener. Test attachEvent first because IE9 has
            //a subtle issue in its addEventListener and script onload firings
            //that do not match the behavior of all other browsers with
            //addEventListener support, which fire the onload event for a
            //script right after the script execution. See:
            //https://connect.microsoft.com/IE/feedback/details/648057/script-onload-event-is-not-fired-immediately-after-script-execution
            //UNFORTUNATELY Opera implements attachEvent but does not follow the script
            //script execution mode.
            if (node.attachEvent &&
                    //Check if node.attachEvent is artificially added by custom script or
                    //natively supported by browser
                    //read https://github.com/jrburke/requirejs/issues/187
                    //if we can NOT find [native code] then it must NOT natively supported.
                    //in IE8, node.attachEvent does not have toString()
                    //Note the test for "[native code" with no closing brace, see:
                    //https://github.com/jrburke/requirejs/issues/273
                    !(node.attachEvent.toString && node.attachEvent.toString().indexOf('[native code') < 0) &&
                    !isOpera) {
                //Probably IE. IE (at least 6-8) do not fire
                //script onload right after executing the script, so
                //we cannot tie the anonymous define call to a name.
                //However, IE reports the script as being in 'interactive'
                //readyState at the time of the define call.
                useInteractive = true;

                node.attachEvent('onreadystatechange', context.onScriptLoad);
                //It would be great to add an error handler here to catch
                //404s in IE9+. However, onreadystatechange will fire before
                //the error handler, so that does not help. If addEventListener
                //is used, then IE will fire error before load, but we cannot
                //use that pathway given the connect.microsoft.com issue
                //mentioned above about not doing the 'script execute,
                //then fire the script load event listener before execute
                //next script' that other browsers do.
                //Best hope: IE10 fixes the issues,
                //and then destroys all installs of IE 6-9.
                //node.attachEvent('onerror', context.onScriptError);
            } else {
                node.addEventListener('load', context.onScriptLoad, false);
                node.addEventListener('error', context.onScriptError, false);
            }
            node.src = url;

            //For some cache cases in IE 6-8, the script executes before the end
            //of the appendChild execution, so to tie an anonymous define
            //call to the module name (which is stored on the node), hold on
            //to a reference to this node, but clear after the DOM insertion.
            currentlyAddingScript = node;
            if (baseElement) {
                head.insertBefore(node, baseElement);
            } else {
                head.appendChild(node);
            }
            currentlyAddingScript = null;

            return node;
        } else if (isWebWorker) {
            try {
                //In a web worker, use importScripts. This is not a very
                //efficient use of importScripts, importScripts will block until
                //its script is downloaded and evaluated. However, if web workers
                //are in play, the expectation that a build has been done so that
                //only one script needs to be loaded anyway. This may need to be
                //reevaluated if other use cases become common.
                importScripts(url);

                //Account for anonymous modules
                context.completeLoad(moduleName);
            } catch (e) {
                context.onError(makeError('importscripts',
                                'importScripts failed for ' +
                                    moduleName + ' at ' + url,
                                e,
                                [moduleName]));
            }
        }
    };

    function getInteractiveScript() {
        if (interactiveScript && interactiveScript.readyState === 'interactive') {
            return interactiveScript;
        }

        eachReverse(scripts(), function (script) {
            if (script.readyState === 'interactive') {
                return (interactiveScript = script);
            }
        });
        return interactiveScript;
    }

    //Look for a data-main script attribute, which could also adjust the baseUrl.
    if (isBrowser) {
        //Figure out baseUrl. Get it from the script tag with require.js in it.
        eachReverse(scripts(), function (script) {
            //Set the 'head' where we can append children by
            //using the script's parent.
            if (!head) {
                head = script.parentNode;
            }

            //Look for a data-main attribute to set main script for the page
            //to load. If it is there, the path to data main becomes the
            //baseUrl, if it is not already set.
            dataMain = script.getAttribute('data-main');
            if (dataMain) {
                //Set final baseUrl if there is not already an explicit one.
                if (!cfg.baseUrl) {
                    //Pull off the directory of data-main for use as the
                    //baseUrl.
                    src = dataMain.split('/');
                    mainScript = src.pop();
                    subPath = src.length ? src.join('/')  + '/' : './';

                    cfg.baseUrl = subPath;
                    dataMain = mainScript;
                }

                //Strip off any trailing .js since dataMain is now
                //like a module name.
                dataMain = dataMain.replace(jsSuffixRegExp, '');

                //Put the data-main script in the files to load.
                cfg.deps = cfg.deps ? cfg.deps.concat(dataMain) : [dataMain];

                return true;
            }
        });
    }

    /**
     * The function that handles definitions of modules. Differs from
     * require() in that a string for the module should be the first argument,
     * and the function to execute after dependencies are loaded should
     * return a value to define the module corresponding to the first argument's
     * name.
     */
    define = function (name, deps, callback) {
        var node, context;

        //Allow for anonymous modules
        if (typeof name !== 'string') {
            //Adjust args appropriately
            callback = deps;
            deps = name;
            name = null;
        }

        //This module may not have dependencies
        if (!isArray(deps)) {
            callback = deps;
            deps = [];
        }

        //If no name, and callback is a function, then figure out if it a
        //CommonJS thing with dependencies.
        if (!deps.length && isFunction(callback)) {
            //Remove comments from the callback string,
            //look for require calls, and pull them into the dependencies,
            //but only if there are function args.
            if (callback.length) {
                callback
                    .toString()
                    .replace(commentRegExp, '')
                    .replace(cjsRequireRegExp, function (match, dep) {
                        deps.push(dep);
                    });

                //May be a CommonJS thing even without require calls, but still
                //could use exports, and module. Avoid doing exports and module
                //work though if it just needs require.
                //REQUIRES the function to expect the CommonJS variables in the
                //order listed below.
                deps = (callback.length === 1 ? ['require'] : ['require', 'exports', 'module']).concat(deps);
            }
        }

        //If in IE 6-8 and hit an anonymous define() call, do the interactive
        //work.
        if (useInteractive) {
            node = currentlyAddingScript || getInteractiveScript();
            if (node) {
                if (!name) {
                    name = node.getAttribute('data-requiremodule');
                }
                context = contexts[node.getAttribute('data-requirecontext')];
            }
        }

        //Always save off evaluating the def call until the script onload handler.
        //This allows multiple modules to be in a file without prematurely
        //tracing dependencies, and allows for anonymous module support,
        //where the module name is not known until the script onload event
        //occurs. If no context, use the global queue, and get it processed
        //in the onscript load callback.
        (context ? context.defQueue : globalDefQueue).push([name, deps, callback]);
    };

    define.amd = {
        jQuery: true
    };


    /**
     * Executes the text. Normally just uses eval, but can be modified
     * to use a better, environment-specific call. Only used for transpiling
     * loader plugins, not for plain JS modules.
     * @param {String} text the text to execute/evaluate.
     */
    req.exec = function (text) {
        /*jslint evil: true */
        return eval(text);
    };

    //Set up with config info.
    req(cfg);
}(this));

var components = {
    "packages": [
        {
            "name": "greensock-js",
            "main": "greensock-js-built.js"
        }
    ],
    "baseUrl": "components"
};
if (typeof require !== "undefined" && require.config) {
    require.config(components);
} else {
    var require = components;
}
if (typeof exports !== "undefined" && typeof module !== "undefined") {
    module.exports = components;
}
define('greensock-js', function (require, exports, module) {
/*!
 * VERSION: 1.11.5
 * DATE: 2014-02-20
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";window._gsDefine("TimelineLite",["core.Animation","core.SimpleTimeline","TweenLite"],function(t,e,i){var s=function(t){e.call(this,t),this._labels={},this.autoRemoveChildren=this.vars.autoRemoveChildren===!0,this.smoothChildTiming=this.vars.smoothChildTiming===!0,this._sortChildren=!0,this._onUpdate=this.vars.onUpdate;var i,s,r=this.vars;for(s in r)i=r[s],a(i)&&-1!==i.join("").indexOf("{self}")&&(r[s]=this._swapSelfInParams(i));a(r.tweens)&&this.add(r.tweens,0,r.align,r.stagger)},r=1e-10,n=i._internals.isSelector,a=i._internals.isArray,o=[],h=function(t){var e,i={};for(e in t)i[e]=t[e];return i},l=function(t,e,i,s){t._timeline.pause(t._startTime),e&&e.apply(s||t._timeline,i||o)},_=o.slice,u=s.prototype=new e;return s.version="1.11.5",u.constructor=s,u.kill()._gc=!1,u.to=function(t,e,s,r){return e?this.add(new i(t,e,s),r):this.set(t,s,r)},u.from=function(t,e,s,r){return this.add(i.from(t,e,s),r)},u.fromTo=function(t,e,s,r,n){return e?this.add(i.fromTo(t,e,s,r),n):this.set(t,r,n)},u.staggerTo=function(t,e,r,a,o,l,u,p){var f,c=new s({onComplete:l,onCompleteParams:u,onCompleteScope:p,smoothChildTiming:this.smoothChildTiming});for("string"==typeof t&&(t=i.selector(t)||t),n(t)&&(t=_.call(t,0)),a=a||0,f=0;t.length>f;f++)r.startAt&&(r.startAt=h(r.startAt)),c.to(t[f],e,h(r),f*a);return this.add(c,o)},u.staggerFrom=function(t,e,i,s,r,n,a,o){return i.immediateRender=0!=i.immediateRender,i.runBackwards=!0,this.staggerTo(t,e,i,s,r,n,a,o)},u.staggerFromTo=function(t,e,i,s,r,n,a,o,h){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,this.staggerTo(t,e,s,r,n,a,o,h)},u.call=function(t,e,s,r){return this.add(i.delayedCall(0,t,e,s),r)},u.set=function(t,e,s){return s=this._parseTimeOrLabel(s,0,!0),null==e.immediateRender&&(e.immediateRender=s===this._time&&!this._paused),this.add(new i(t,0,e),s)},s.exportRoot=function(t,e){t=t||{},null==t.smoothChildTiming&&(t.smoothChildTiming=!0);var r,n,a=new s(t),o=a._timeline;for(null==e&&(e=!0),o._remove(a,!0),a._startTime=0,a._rawPrevTime=a._time=a._totalTime=o._time,r=o._first;r;)n=r._next,e&&r instanceof i&&r.target===r.vars.onComplete||a.add(r,r._startTime-r._delay),r=n;return o.add(a,0),a},u.add=function(r,n,o,h){var l,_,u,p,f,c;if("number"!=typeof n&&(n=this._parseTimeOrLabel(n,0,!0,r)),!(r instanceof t)){if(r instanceof Array||r&&r.push&&a(r)){for(o=o||"normal",h=h||0,l=n,_=r.length,u=0;_>u;u++)a(p=r[u])&&(p=new s({tweens:p})),this.add(p,l),"string"!=typeof p&&"function"!=typeof p&&("sequence"===o?l=p._startTime+p.totalDuration()/p._timeScale:"start"===o&&(p._startTime-=p.delay())),l+=h;return this._uncache(!0)}if("string"==typeof r)return this.addLabel(r,n);if("function"!=typeof r)throw"Cannot add "+r+" into the timeline; it is not a tween, timeline, function, or string.";r=i.delayedCall(0,r)}if(e.prototype.add.call(this,r,n),(this._gc||this._time===this._duration)&&!this._paused&&this._duration<this.duration())for(f=this,c=f.rawTime()>r._startTime;f._timeline;)c&&f._timeline.smoothChildTiming?f.totalTime(f._totalTime,!0):f._gc&&f._enabled(!0,!1),f=f._timeline;return this},u.remove=function(e){if(e instanceof t)return this._remove(e,!1);if(e instanceof Array||e&&e.push&&a(e)){for(var i=e.length;--i>-1;)this.remove(e[i]);return this}return"string"==typeof e?this.removeLabel(e):this.kill(null,e)},u._remove=function(t,i){e.prototype._remove.call(this,t,i);var s=this._last;return s?this._time>s._startTime+s._totalDuration/s._timeScale&&(this._time=this.duration(),this._totalTime=this._totalDuration):this._time=this._totalTime=this._duration=this._totalDuration=0,this},u.append=function(t,e){return this.add(t,this._parseTimeOrLabel(null,e,!0,t))},u.insert=u.insertMultiple=function(t,e,i,s){return this.add(t,e||0,i,s)},u.appendMultiple=function(t,e,i,s){return this.add(t,this._parseTimeOrLabel(null,e,!0,t),i,s)},u.addLabel=function(t,e){return this._labels[t]=this._parseTimeOrLabel(e),this},u.addPause=function(t,e,i,s){return this.call(l,["{self}",e,i,s],this,t)},u.removeLabel=function(t){return delete this._labels[t],this},u.getLabelTime=function(t){return null!=this._labels[t]?this._labels[t]:-1},u._parseTimeOrLabel=function(e,i,s,r){var n;if(r instanceof t&&r.timeline===this)this.remove(r);else if(r&&(r instanceof Array||r.push&&a(r)))for(n=r.length;--n>-1;)r[n]instanceof t&&r[n].timeline===this&&this.remove(r[n]);if("string"==typeof i)return this._parseTimeOrLabel(i,s&&"number"==typeof e&&null==this._labels[i]?e-this.duration():0,s);if(i=i||0,"string"!=typeof e||!isNaN(e)&&null==this._labels[e])null==e&&(e=this.duration());else{if(n=e.indexOf("="),-1===n)return null==this._labels[e]?s?this._labels[e]=this.duration()+i:i:this._labels[e]+i;i=parseInt(e.charAt(n-1)+"1",10)*Number(e.substr(n+1)),e=n>1?this._parseTimeOrLabel(e.substr(0,n-1),0,s):this.duration()}return Number(e)+i},u.seek=function(t,e){return this.totalTime("number"==typeof t?t:this._parseTimeOrLabel(t),e!==!1)},u.stop=function(){return this.paused(!0)},u.gotoAndPlay=function(t,e){return this.play(t,e)},u.gotoAndStop=function(t,e){return this.pause(t,e)},u.render=function(t,e,i){this._gc&&this._enabled(!0,!1);var s,n,a,h,l,_=this._dirty?this.totalDuration():this._totalDuration,u=this._time,p=this._startTime,f=this._timeScale,c=this._paused;if(t>=_?(this._totalTime=this._time=_,this._reversed||this._hasPausedChild()||(n=!0,h="onComplete",0===this._duration&&(0===t||0>this._rawPrevTime||this._rawPrevTime===r)&&this._rawPrevTime!==t&&this._first&&(l=!0,this._rawPrevTime>r&&(h="onReverseComplete"))),this._rawPrevTime=this._duration||!e||t||0===this._rawPrevTime?t:r,t=_+1e-4):1e-7>t?(this._totalTime=this._time=0,(0!==u||0===this._duration&&(this._rawPrevTime>r||0>t&&this._rawPrevTime>=0))&&(h="onReverseComplete",n=this._reversed),0>t?(this._active=!1,0===this._duration&&this._rawPrevTime>=0&&this._first&&(l=!0),this._rawPrevTime=t):(this._rawPrevTime=this._duration||!e||t||0===this._rawPrevTime?t:r,t=0,this._initted||(l=!0))):this._totalTime=this._time=this._rawPrevTime=t,this._time!==u&&this._first||i||l){if(this._initted||(this._initted=!0),this._active||!this._paused&&this._time!==u&&t>0&&(this._active=!0),0===u&&this.vars.onStart&&0!==this._time&&(e||this.vars.onStart.apply(this.vars.onStartScope||this,this.vars.onStartParams||o)),this._time>=u)for(s=this._first;s&&(a=s._next,!this._paused||c);)(s._active||s._startTime<=this._time&&!s._paused&&!s._gc)&&(s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=a;else for(s=this._last;s&&(a=s._prev,!this._paused||c);)(s._active||u>=s._startTime&&!s._paused&&!s._gc)&&(s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=a;this._onUpdate&&(e||this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||o)),h&&(this._gc||(p===this._startTime||f!==this._timeScale)&&(0===this._time||_>=this.totalDuration())&&(n&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[h]&&this.vars[h].apply(this.vars[h+"Scope"]||this,this.vars[h+"Params"]||o)))}},u._hasPausedChild=function(){for(var t=this._first;t;){if(t._paused||t instanceof s&&t._hasPausedChild())return!0;t=t._next}return!1},u.getChildren=function(t,e,s,r){r=r||-9999999999;for(var n=[],a=this._first,o=0;a;)r>a._startTime||(a instanceof i?e!==!1&&(n[o++]=a):(s!==!1&&(n[o++]=a),t!==!1&&(n=n.concat(a.getChildren(!0,e,s)),o=n.length))),a=a._next;return n},u.getTweensOf=function(t,e){for(var s=i.getTweensOf(t),r=s.length,n=[],a=0;--r>-1;)(s[r].timeline===this||e&&this._contains(s[r]))&&(n[a++]=s[r]);return n},u._contains=function(t){for(var e=t.timeline;e;){if(e===this)return!0;e=e.timeline}return!1},u.shiftChildren=function(t,e,i){i=i||0;for(var s,r=this._first,n=this._labels;r;)r._startTime>=i&&(r._startTime+=t),r=r._next;if(e)for(s in n)n[s]>=i&&(n[s]+=t);return this._uncache(!0)},u._kill=function(t,e){if(!t&&!e)return this._enabled(!1,!1);for(var i=e?this.getTweensOf(e):this.getChildren(!0,!0,!1),s=i.length,r=!1;--s>-1;)i[s]._kill(t,e)&&(r=!0);return r},u.clear=function(t){var e=this.getChildren(!1,!0,!0),i=e.length;for(this._time=this._totalTime=0;--i>-1;)e[i]._enabled(!1,!1);return t!==!1&&(this._labels={}),this._uncache(!0)},u.invalidate=function(){for(var t=this._first;t;)t.invalidate(),t=t._next;return this},u._enabled=function(t,i){if(t===this._gc)for(var s=this._first;s;)s._enabled(t,!0),s=s._next;return e.prototype._enabled.call(this,t,i)},u.duration=function(t){return arguments.length?(0!==this.duration()&&0!==t&&this.timeScale(this._duration/t),this):(this._dirty&&this.totalDuration(),this._duration)},u.totalDuration=function(t){if(!arguments.length){if(this._dirty){for(var e,i,s=0,r=this._last,n=999999999999;r;)e=r._prev,r._dirty&&r.totalDuration(),r._startTime>n&&this._sortChildren&&!r._paused?this.add(r,r._startTime-r._delay):n=r._startTime,0>r._startTime&&!r._paused&&(s-=r._startTime,this._timeline.smoothChildTiming&&(this._startTime+=r._startTime/this._timeScale),this.shiftChildren(-r._startTime,!1,-9999999999),n=0),i=r._startTime+r._totalDuration/r._timeScale,i>s&&(s=i),r=e;this._duration=this._totalDuration=s,this._dirty=!1}return this._totalDuration}return 0!==this.totalDuration()&&0!==t&&this.timeScale(this._totalDuration/t),this},u.usesFrames=function(){for(var e=this._timeline;e._timeline;)e=e._timeline;return e===t._rootFramesTimeline},u.rawTime=function(){return this._paused?this._totalTime:(this._timeline.rawTime()-this._startTime)*this._timeScale},s},!0)}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: 1.11.5
 * DATE: 2014-02-20
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";window._gsDefine("TimelineMax",["TimelineLite","TweenLite","easing.Ease"],function(t,e,i){var s=function(e){t.call(this,e),this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._cycle=0,this._yoyo=this.vars.yoyo===!0,this._dirty=!0},r=1e-10,n=[],a=new i(null,null,1,0),o=s.prototype=new t;return o.constructor=s,o.kill()._gc=!1,s.version="1.11.5",o.invalidate=function(){return this._yoyo=this.vars.yoyo===!0,this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._uncache(!0),t.prototype.invalidate.call(this)},o.addCallback=function(t,i,s,r){return this.add(e.delayedCall(0,t,s,r),i)},o.removeCallback=function(t,e){if(t)if(null==e)this._kill(null,t);else for(var i=this.getTweensOf(t,!1),s=i.length,r=this._parseTimeOrLabel(e);--s>-1;)i[s]._startTime===r&&i[s]._enabled(!1,!1);return this},o.tweenTo=function(t,i){i=i||{};var s,r,o,h={ease:a,overwrite:2,useFrames:this.usesFrames(),immediateRender:!1};for(r in i)h[r]=i[r];return h.time=this._parseTimeOrLabel(t),s=Math.abs(Number(h.time)-this._time)/this._timeScale||.001,o=new e(this,s,h),h.onStart=function(){o.target.paused(!0),o.vars.time!==o.target.time()&&s===o.duration()&&o.duration(Math.abs(o.vars.time-o.target.time())/o.target._timeScale),i.onStart&&i.onStart.apply(i.onStartScope||o,i.onStartParams||n)},o},o.tweenFromTo=function(t,e,i){i=i||{},t=this._parseTimeOrLabel(t),i.startAt={onComplete:this.seek,onCompleteParams:[t],onCompleteScope:this},i.immediateRender=i.immediateRender!==!1;var s=this.tweenTo(e,i);return s.duration(Math.abs(s.vars.time-t)/this._timeScale||.001)},o.render=function(t,e,i){this._gc&&this._enabled(!0,!1);var s,a,o,h,l,_,u=this._dirty?this.totalDuration():this._totalDuration,c=this._duration,p=this._time,f=this._totalTime,m=this._startTime,d=this._timeScale,g=this._rawPrevTime,v=this._paused,T=this._cycle;if(t>=u?(this._locked||(this._totalTime=u,this._cycle=this._repeat),this._reversed||this._hasPausedChild()||(a=!0,h="onComplete",0===this._duration&&(0===t||0>g||g===r)&&g!==t&&this._first&&(l=!0,g>r&&(h="onReverseComplete"))),this._rawPrevTime=this._duration||!e||t||0===this._rawPrevTime?t:r,this._yoyo&&0!==(1&this._cycle)?this._time=t=0:(this._time=c,t=c+1e-4)):1e-7>t?(this._locked||(this._totalTime=this._cycle=0),this._time=0,(0!==p||0===c&&(g>r||0>t&&g>=0)&&!this._locked)&&(h="onReverseComplete",a=this._reversed),0>t?(this._active=!1,0===c&&g>=0&&this._first&&(l=!0),this._rawPrevTime=t):(this._rawPrevTime=c||!e||t||0===this._rawPrevTime?t:r,t=0,this._initted||(l=!0))):(0===c&&0>g&&(l=!0),this._time=this._rawPrevTime=t,this._locked||(this._totalTime=t,0!==this._repeat&&(_=c+this._repeatDelay,this._cycle=this._totalTime/_>>0,0!==this._cycle&&this._cycle===this._totalTime/_&&this._cycle--,this._time=this._totalTime-this._cycle*_,this._yoyo&&0!==(1&this._cycle)&&(this._time=c-this._time),this._time>c?(this._time=c,t=c+1e-4):0>this._time?this._time=t=0:t=this._time))),this._cycle!==T&&!this._locked){var y=this._yoyo&&0!==(1&T),w=y===(this._yoyo&&0!==(1&this._cycle)),b=this._totalTime,x=this._cycle,P=this._rawPrevTime,S=this._time;if(this._totalTime=T*c,T>this._cycle?y=!y:this._totalTime+=c,this._time=p,this._rawPrevTime=0===c?g-1e-4:g,this._cycle=T,this._locked=!0,p=y?0:c,this.render(p,e,0===c),e||this._gc||this.vars.onRepeat&&this.vars.onRepeat.apply(this.vars.onRepeatScope||this,this.vars.onRepeatParams||n),w&&(p=y?c+1e-4:-1e-4,this.render(p,!0,!1)),this._locked=!1,this._paused&&!v)return;this._time=S,this._totalTime=b,this._cycle=x,this._rawPrevTime=P}if(!(this._time!==p&&this._first||i||l))return f!==this._totalTime&&this._onUpdate&&(e||this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||n)),void 0;if(this._initted||(this._initted=!0),this._active||!this._paused&&this._totalTime!==f&&t>0&&(this._active=!0),0===f&&this.vars.onStart&&0!==this._totalTime&&(e||this.vars.onStart.apply(this.vars.onStartScope||this,this.vars.onStartParams||n)),this._time>=p)for(s=this._first;s&&(o=s._next,!this._paused||v);)(s._active||s._startTime<=this._time&&!s._paused&&!s._gc)&&(s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=o;else for(s=this._last;s&&(o=s._prev,!this._paused||v);)(s._active||p>=s._startTime&&!s._paused&&!s._gc)&&(s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=o;this._onUpdate&&(e||this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||n)),h&&(this._locked||this._gc||(m===this._startTime||d!==this._timeScale)&&(0===this._time||u>=this.totalDuration())&&(a&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[h]&&this.vars[h].apply(this.vars[h+"Scope"]||this,this.vars[h+"Params"]||n)))},o.getActive=function(t,e,i){null==t&&(t=!0),null==e&&(e=!0),null==i&&(i=!1);var s,r,n=[],a=this.getChildren(t,e,i),o=0,h=a.length;for(s=0;h>s;s++)r=a[s],r.isActive()&&(n[o++]=r);return n},o.getLabelAfter=function(t){t||0!==t&&(t=this._time);var e,i=this.getLabelsArray(),s=i.length;for(e=0;s>e;e++)if(i[e].time>t)return i[e].name;return null},o.getLabelBefore=function(t){null==t&&(t=this._time);for(var e=this.getLabelsArray(),i=e.length;--i>-1;)if(t>e[i].time)return e[i].name;return null},o.getLabelsArray=function(){var t,e=[],i=0;for(t in this._labels)e[i++]={time:this._labels[t],name:t};return e.sort(function(t,e){return t.time-e.time}),e},o.progress=function(t){return arguments.length?this.totalTime(this.duration()*(this._yoyo&&0!==(1&this._cycle)?1-t:t)+this._cycle*(this._duration+this._repeatDelay),!1):this._time/this.duration()},o.totalProgress=function(t){return arguments.length?this.totalTime(this.totalDuration()*t,!1):this._totalTime/this.totalDuration()},o.totalDuration=function(e){return arguments.length?-1===this._repeat?this:this.duration((e-this._repeat*this._repeatDelay)/(this._repeat+1)):(this._dirty&&(t.prototype.totalDuration.call(this),this._totalDuration=-1===this._repeat?999999999999:this._duration*(this._repeat+1)+this._repeatDelay*this._repeat),this._totalDuration)},o.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),t>this._duration&&(t=this._duration),this._yoyo&&0!==(1&this._cycle)?t=this._duration-t+this._cycle*(this._duration+this._repeatDelay):0!==this._repeat&&(t+=this._cycle*(this._duration+this._repeatDelay)),this.totalTime(t,e)):this._time},o.repeat=function(t){return arguments.length?(this._repeat=t,this._uncache(!0)):this._repeat},o.repeatDelay=function(t){return arguments.length?(this._repeatDelay=t,this._uncache(!0)):this._repeatDelay},o.yoyo=function(t){return arguments.length?(this._yoyo=t,this):this._yoyo},o.currentLabel=function(t){return arguments.length?this.seek(t,!0):this.getLabelBefore(this._time+1e-8)},s},!0),window._gsDefine("TimelineLite",["core.Animation","core.SimpleTimeline","TweenLite"],function(t,e,i){var s=function(t){e.call(this,t),this._labels={},this.autoRemoveChildren=this.vars.autoRemoveChildren===!0,this.smoothChildTiming=this.vars.smoothChildTiming===!0,this._sortChildren=!0,this._onUpdate=this.vars.onUpdate;var i,s,r=this.vars;for(s in r)i=r[s],a(i)&&-1!==i.join("").indexOf("{self}")&&(r[s]=this._swapSelfInParams(i));a(r.tweens)&&this.add(r.tweens,0,r.align,r.stagger)},r=1e-10,n=i._internals.isSelector,a=i._internals.isArray,o=[],h=function(t){var e,i={};for(e in t)i[e]=t[e];return i},l=function(t,e,i,s){t._timeline.pause(t._startTime),e&&e.apply(s||t._timeline,i||o)},_=o.slice,u=s.prototype=new e;return s.version="1.11.5",u.constructor=s,u.kill()._gc=!1,u.to=function(t,e,s,r){return e?this.add(new i(t,e,s),r):this.set(t,s,r)},u.from=function(t,e,s,r){return this.add(i.from(t,e,s),r)},u.fromTo=function(t,e,s,r,n){return e?this.add(i.fromTo(t,e,s,r),n):this.set(t,r,n)},u.staggerTo=function(t,e,r,a,o,l,u,c){var p,f=new s({onComplete:l,onCompleteParams:u,onCompleteScope:c,smoothChildTiming:this.smoothChildTiming});for("string"==typeof t&&(t=i.selector(t)||t),n(t)&&(t=_.call(t,0)),a=a||0,p=0;t.length>p;p++)r.startAt&&(r.startAt=h(r.startAt)),f.to(t[p],e,h(r),p*a);return this.add(f,o)},u.staggerFrom=function(t,e,i,s,r,n,a,o){return i.immediateRender=0!=i.immediateRender,i.runBackwards=!0,this.staggerTo(t,e,i,s,r,n,a,o)},u.staggerFromTo=function(t,e,i,s,r,n,a,o,h){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,this.staggerTo(t,e,s,r,n,a,o,h)},u.call=function(t,e,s,r){return this.add(i.delayedCall(0,t,e,s),r)},u.set=function(t,e,s){return s=this._parseTimeOrLabel(s,0,!0),null==e.immediateRender&&(e.immediateRender=s===this._time&&!this._paused),this.add(new i(t,0,e),s)},s.exportRoot=function(t,e){t=t||{},null==t.smoothChildTiming&&(t.smoothChildTiming=!0);var r,n,a=new s(t),o=a._timeline;for(null==e&&(e=!0),o._remove(a,!0),a._startTime=0,a._rawPrevTime=a._time=a._totalTime=o._time,r=o._first;r;)n=r._next,e&&r instanceof i&&r.target===r.vars.onComplete||a.add(r,r._startTime-r._delay),r=n;return o.add(a,0),a},u.add=function(r,n,o,h){var l,_,u,c,p,f;if("number"!=typeof n&&(n=this._parseTimeOrLabel(n,0,!0,r)),!(r instanceof t)){if(r instanceof Array||r&&r.push&&a(r)){for(o=o||"normal",h=h||0,l=n,_=r.length,u=0;_>u;u++)a(c=r[u])&&(c=new s({tweens:c})),this.add(c,l),"string"!=typeof c&&"function"!=typeof c&&("sequence"===o?l=c._startTime+c.totalDuration()/c._timeScale:"start"===o&&(c._startTime-=c.delay())),l+=h;return this._uncache(!0)}if("string"==typeof r)return this.addLabel(r,n);if("function"!=typeof r)throw"Cannot add "+r+" into the timeline; it is not a tween, timeline, function, or string.";r=i.delayedCall(0,r)}if(e.prototype.add.call(this,r,n),(this._gc||this._time===this._duration)&&!this._paused&&this._duration<this.duration())for(p=this,f=p.rawTime()>r._startTime;p._timeline;)f&&p._timeline.smoothChildTiming?p.totalTime(p._totalTime,!0):p._gc&&p._enabled(!0,!1),p=p._timeline;return this},u.remove=function(e){if(e instanceof t)return this._remove(e,!1);if(e instanceof Array||e&&e.push&&a(e)){for(var i=e.length;--i>-1;)this.remove(e[i]);return this}return"string"==typeof e?this.removeLabel(e):this.kill(null,e)},u._remove=function(t,i){e.prototype._remove.call(this,t,i);var s=this._last;return s?this._time>s._startTime+s._totalDuration/s._timeScale&&(this._time=this.duration(),this._totalTime=this._totalDuration):this._time=this._totalTime=this._duration=this._totalDuration=0,this},u.append=function(t,e){return this.add(t,this._parseTimeOrLabel(null,e,!0,t))},u.insert=u.insertMultiple=function(t,e,i,s){return this.add(t,e||0,i,s)},u.appendMultiple=function(t,e,i,s){return this.add(t,this._parseTimeOrLabel(null,e,!0,t),i,s)},u.addLabel=function(t,e){return this._labels[t]=this._parseTimeOrLabel(e),this},u.addPause=function(t,e,i,s){return this.call(l,["{self}",e,i,s],this,t)},u.removeLabel=function(t){return delete this._labels[t],this},u.getLabelTime=function(t){return null!=this._labels[t]?this._labels[t]:-1},u._parseTimeOrLabel=function(e,i,s,r){var n;if(r instanceof t&&r.timeline===this)this.remove(r);else if(r&&(r instanceof Array||r.push&&a(r)))for(n=r.length;--n>-1;)r[n]instanceof t&&r[n].timeline===this&&this.remove(r[n]);if("string"==typeof i)return this._parseTimeOrLabel(i,s&&"number"==typeof e&&null==this._labels[i]?e-this.duration():0,s);if(i=i||0,"string"!=typeof e||!isNaN(e)&&null==this._labels[e])null==e&&(e=this.duration());else{if(n=e.indexOf("="),-1===n)return null==this._labels[e]?s?this._labels[e]=this.duration()+i:i:this._labels[e]+i;i=parseInt(e.charAt(n-1)+"1",10)*Number(e.substr(n+1)),e=n>1?this._parseTimeOrLabel(e.substr(0,n-1),0,s):this.duration()}return Number(e)+i},u.seek=function(t,e){return this.totalTime("number"==typeof t?t:this._parseTimeOrLabel(t),e!==!1)},u.stop=function(){return this.paused(!0)},u.gotoAndPlay=function(t,e){return this.play(t,e)},u.gotoAndStop=function(t,e){return this.pause(t,e)},u.render=function(t,e,i){this._gc&&this._enabled(!0,!1);var s,n,a,h,l,_=this._dirty?this.totalDuration():this._totalDuration,u=this._time,c=this._startTime,p=this._timeScale,f=this._paused;if(t>=_?(this._totalTime=this._time=_,this._reversed||this._hasPausedChild()||(n=!0,h="onComplete",0===this._duration&&(0===t||0>this._rawPrevTime||this._rawPrevTime===r)&&this._rawPrevTime!==t&&this._first&&(l=!0,this._rawPrevTime>r&&(h="onReverseComplete"))),this._rawPrevTime=this._duration||!e||t||0===this._rawPrevTime?t:r,t=_+1e-4):1e-7>t?(this._totalTime=this._time=0,(0!==u||0===this._duration&&(this._rawPrevTime>r||0>t&&this._rawPrevTime>=0))&&(h="onReverseComplete",n=this._reversed),0>t?(this._active=!1,0===this._duration&&this._rawPrevTime>=0&&this._first&&(l=!0),this._rawPrevTime=t):(this._rawPrevTime=this._duration||!e||t||0===this._rawPrevTime?t:r,t=0,this._initted||(l=!0))):this._totalTime=this._time=this._rawPrevTime=t,this._time!==u&&this._first||i||l){if(this._initted||(this._initted=!0),this._active||!this._paused&&this._time!==u&&t>0&&(this._active=!0),0===u&&this.vars.onStart&&0!==this._time&&(e||this.vars.onStart.apply(this.vars.onStartScope||this,this.vars.onStartParams||o)),this._time>=u)for(s=this._first;s&&(a=s._next,!this._paused||f);)(s._active||s._startTime<=this._time&&!s._paused&&!s._gc)&&(s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=a;else for(s=this._last;s&&(a=s._prev,!this._paused||f);)(s._active||u>=s._startTime&&!s._paused&&!s._gc)&&(s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=a;this._onUpdate&&(e||this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||o)),h&&(this._gc||(c===this._startTime||p!==this._timeScale)&&(0===this._time||_>=this.totalDuration())&&(n&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[h]&&this.vars[h].apply(this.vars[h+"Scope"]||this,this.vars[h+"Params"]||o)))}},u._hasPausedChild=function(){for(var t=this._first;t;){if(t._paused||t instanceof s&&t._hasPausedChild())return!0;t=t._next}return!1},u.getChildren=function(t,e,s,r){r=r||-9999999999;for(var n=[],a=this._first,o=0;a;)r>a._startTime||(a instanceof i?e!==!1&&(n[o++]=a):(s!==!1&&(n[o++]=a),t!==!1&&(n=n.concat(a.getChildren(!0,e,s)),o=n.length))),a=a._next;return n},u.getTweensOf=function(t,e){for(var s=i.getTweensOf(t),r=s.length,n=[],a=0;--r>-1;)(s[r].timeline===this||e&&this._contains(s[r]))&&(n[a++]=s[r]);return n},u._contains=function(t){for(var e=t.timeline;e;){if(e===this)return!0;e=e.timeline}return!1},u.shiftChildren=function(t,e,i){i=i||0;for(var s,r=this._first,n=this._labels;r;)r._startTime>=i&&(r._startTime+=t),r=r._next;if(e)for(s in n)n[s]>=i&&(n[s]+=t);return this._uncache(!0)},u._kill=function(t,e){if(!t&&!e)return this._enabled(!1,!1);for(var i=e?this.getTweensOf(e):this.getChildren(!0,!0,!1),s=i.length,r=!1;--s>-1;)i[s]._kill(t,e)&&(r=!0);return r},u.clear=function(t){var e=this.getChildren(!1,!0,!0),i=e.length;for(this._time=this._totalTime=0;--i>-1;)e[i]._enabled(!1,!1);return t!==!1&&(this._labels={}),this._uncache(!0)},u.invalidate=function(){for(var t=this._first;t;)t.invalidate(),t=t._next;return this},u._enabled=function(t,i){if(t===this._gc)for(var s=this._first;s;)s._enabled(t,!0),s=s._next;return e.prototype._enabled.call(this,t,i)},u.duration=function(t){return arguments.length?(0!==this.duration()&&0!==t&&this.timeScale(this._duration/t),this):(this._dirty&&this.totalDuration(),this._duration)},u.totalDuration=function(t){if(!arguments.length){if(this._dirty){for(var e,i,s=0,r=this._last,n=999999999999;r;)e=r._prev,r._dirty&&r.totalDuration(),r._startTime>n&&this._sortChildren&&!r._paused?this.add(r,r._startTime-r._delay):n=r._startTime,0>r._startTime&&!r._paused&&(s-=r._startTime,this._timeline.smoothChildTiming&&(this._startTime+=r._startTime/this._timeScale),this.shiftChildren(-r._startTime,!1,-9999999999),n=0),i=r._startTime+r._totalDuration/r._timeScale,i>s&&(s=i),r=e;this._duration=this._totalDuration=s,this._dirty=!1}return this._totalDuration}return 0!==this.totalDuration()&&0!==t&&this.timeScale(this._totalDuration/t),this},u.usesFrames=function(){for(var e=this._timeline;e._timeline;)e=e._timeline;return e===t._rootFramesTimeline},u.rawTime=function(){return this._paused?this._totalTime:(this._timeline.rawTime()-this._startTime)*this._timeScale},s},!0)}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: 1.11.5
 * DATE: 2014-02-20
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(function(t){"use strict";var e=t.GreenSockGlobals||t;if(!e.TweenLite){var i,s,r,n,a,o=function(t){var i,s=t.split("."),r=e;for(i=0;s.length>i;i++)r[s[i]]=r=r[s[i]]||{};return r},l=o("com.greensock"),h=1e-10,_=[].slice,u=function(){},m=function(){var t=Object.prototype.toString,e=t.call([]);return function(i){return null!=i&&(i instanceof Array||"object"==typeof i&&!!i.push&&t.call(i)===e)}}(),f={},p=function(i,s,r,n){this.sc=f[i]?f[i].sc:[],f[i]=this,this.gsClass=null,this.func=r;var a=[];this.check=function(l){for(var h,_,u,m,c=s.length,d=c;--c>-1;)(h=f[s[c]]||new p(s[c],[])).gsClass?(a[c]=h.gsClass,d--):l&&h.sc.push(this);if(0===d&&r)for(_=("com.greensock."+i).split("."),u=_.pop(),m=o(_.join("."))[u]=this.gsClass=r.apply(r,a),n&&(e[u]=m,"function"==typeof define&&define.amd?define((t.GreenSockAMDPath?t.GreenSockAMDPath+"/":"")+i.split(".").join("/"),[],function(){return m}):"undefined"!=typeof module&&module.exports&&(module.exports=m)),c=0;this.sc.length>c;c++)this.sc[c].check()},this.check(!0)},c=t._gsDefine=function(t,e,i,s){return new p(t,e,i,s)},d=l._class=function(t,e,i){return e=e||function(){},c(t,[],function(){return e},i),e};c.globals=e;var v=[0,0,1,1],g=[],T=d("easing.Ease",function(t,e,i,s){this._func=t,this._type=i||0,this._power=s||0,this._params=e?v.concat(e):v},!0),w=T.map={},P=T.register=function(t,e,i,s){for(var r,n,a,o,h=e.split(","),_=h.length,u=(i||"easeIn,easeOut,easeInOut").split(",");--_>-1;)for(n=h[_],r=s?d("easing."+n,null,!0):l.easing[n]||{},a=u.length;--a>-1;)o=u[a],w[n+"."+o]=w[o+n]=r[o]=t.getRatio?t:t[o]||new t};for(r=T.prototype,r._calcEnd=!1,r.getRatio=function(t){if(this._func)return this._params[0]=t,this._func.apply(null,this._params);var e=this._type,i=this._power,s=1===e?1-t:2===e?t:.5>t?2*t:2*(1-t);return 1===i?s*=s:2===i?s*=s*s:3===i?s*=s*s*s:4===i&&(s*=s*s*s*s),1===e?1-s:2===e?s:.5>t?s/2:1-s/2},i=["Linear","Quad","Cubic","Quart","Quint,Strong"],s=i.length;--s>-1;)r=i[s]+",Power"+s,P(new T(null,null,1,s),r,"easeOut",!0),P(new T(null,null,2,s),r,"easeIn"+(0===s?",easeNone":"")),P(new T(null,null,3,s),r,"easeInOut");w.linear=l.easing.Linear.easeIn,w.swing=l.easing.Quad.easeInOut;var y=d("events.EventDispatcher",function(t){this._listeners={},this._eventTarget=t||this});r=y.prototype,r.addEventListener=function(t,e,i,s,r){r=r||0;var o,l,h=this._listeners[t],_=0;for(null==h&&(this._listeners[t]=h=[]),l=h.length;--l>-1;)o=h[l],o.c===e&&o.s===i?h.splice(l,1):0===_&&r>o.pr&&(_=l+1);h.splice(_,0,{c:e,s:i,up:s,pr:r}),this!==n||a||n.wake()},r.removeEventListener=function(t,e){var i,s=this._listeners[t];if(s)for(i=s.length;--i>-1;)if(s[i].c===e)return s.splice(i,1),void 0},r.dispatchEvent=function(t){var e,i,s,r=this._listeners[t];if(r)for(e=r.length,i=this._eventTarget;--e>-1;)s=r[e],s.up?s.c.call(s.s||i,{type:t,target:i}):s.c.call(s.s||i)};var b=t.requestAnimationFrame,k=t.cancelAnimationFrame,A=Date.now||function(){return(new Date).getTime()},S=A();for(i=["ms","moz","webkit","o"],s=i.length;--s>-1&&!b;)b=t[i[s]+"RequestAnimationFrame"],k=t[i[s]+"CancelAnimationFrame"]||t[i[s]+"CancelRequestAnimationFrame"];d("Ticker",function(t,e){var i,s,r,o,l,h=this,_=A(),m=e!==!1&&b,f=function(t){S=A(),h.time=(S-_)/1e3;var e,n=h.time-l;(!i||n>0||t===!0)&&(h.frame++,l+=n+(n>=o?.004:o-n),e=!0),t!==!0&&(r=s(f)),e&&h.dispatchEvent("tick")};y.call(h),h.time=h.frame=0,h.tick=function(){f(!0)},h.sleep=function(){null!=r&&(m&&k?k(r):clearTimeout(r),s=u,r=null,h===n&&(a=!1))},h.wake=function(){null!==r&&h.sleep(),s=0===i?u:m&&b?b:function(t){return setTimeout(t,0|1e3*(l-h.time)+1)},h===n&&(a=!0),f(2)},h.fps=function(t){return arguments.length?(i=t,o=1/(i||60),l=this.time+o,h.wake(),void 0):i},h.useRAF=function(t){return arguments.length?(h.sleep(),m=t,h.fps(i),void 0):m},h.fps(t),setTimeout(function(){m&&(!r||5>h.frame)&&h.useRAF(!1)},1500)}),r=l.Ticker.prototype=new l.events.EventDispatcher,r.constructor=l.Ticker;var x=d("core.Animation",function(t,e){if(this.vars=e=e||{},this._duration=this._totalDuration=t||0,this._delay=Number(e.delay)||0,this._timeScale=1,this._active=e.immediateRender===!0,this.data=e.data,this._reversed=e.reversed===!0,Q){a||n.wake();var i=this.vars.useFrames?G:Q;i.add(this,i._time),this.vars.paused&&this.paused(!0)}});n=x.ticker=new l.Ticker,r=x.prototype,r._dirty=r._gc=r._initted=r._paused=!1,r._totalTime=r._time=0,r._rawPrevTime=-1,r._next=r._last=r._onUpdate=r._timeline=r.timeline=null,r._paused=!1;var C=function(){a&&A()-S>2e3&&n.wake(),setTimeout(C,2e3)};C(),r.play=function(t,e){return arguments.length&&this.seek(t,e),this.reversed(!1).paused(!1)},r.pause=function(t,e){return arguments.length&&this.seek(t,e),this.paused(!0)},r.resume=function(t,e){return arguments.length&&this.seek(t,e),this.paused(!1)},r.seek=function(t,e){return this.totalTime(Number(t),e!==!1)},r.restart=function(t,e){return this.reversed(!1).paused(!1).totalTime(t?-this._delay:0,e!==!1,!0)},r.reverse=function(t,e){return arguments.length&&this.seek(t||this.totalDuration(),e),this.reversed(!0).paused(!1)},r.render=function(){},r.invalidate=function(){return this},r.isActive=function(){var t,e=this._timeline,i=this._startTime;return!e||!this._gc&&!this._paused&&e.isActive()&&(t=e.rawTime())>=i&&i+this.totalDuration()/this._timeScale>t},r._enabled=function(t,e){return a||n.wake(),this._gc=!t,this._active=this.isActive(),e!==!0&&(t&&!this.timeline?this._timeline.add(this,this._startTime-this._delay):!t&&this.timeline&&this._timeline._remove(this,!0)),!1},r._kill=function(){return this._enabled(!1,!1)},r.kill=function(t,e){return this._kill(t,e),this},r._uncache=function(t){for(var e=t?this:this.timeline;e;)e._dirty=!0,e=e.timeline;return this},r._swapSelfInParams=function(t){for(var e=t.length,i=t.concat();--e>-1;)"{self}"===t[e]&&(i[e]=this);return i},r.eventCallback=function(t,e,i,s){if("on"===(t||"").substr(0,2)){var r=this.vars;if(1===arguments.length)return r[t];null==e?delete r[t]:(r[t]=e,r[t+"Params"]=m(i)&&-1!==i.join("").indexOf("{self}")?this._swapSelfInParams(i):i,r[t+"Scope"]=s),"onUpdate"===t&&(this._onUpdate=e)}return this},r.delay=function(t){return arguments.length?(this._timeline.smoothChildTiming&&this.startTime(this._startTime+t-this._delay),this._delay=t,this):this._delay},r.duration=function(t){return arguments.length?(this._duration=this._totalDuration=t,this._uncache(!0),this._timeline.smoothChildTiming&&this._time>0&&this._time<this._duration&&0!==t&&this.totalTime(this._totalTime*(t/this._duration),!0),this):(this._dirty=!1,this._duration)},r.totalDuration=function(t){return this._dirty=!1,arguments.length?this.duration(t):this._totalDuration},r.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),this.totalTime(t>this._duration?this._duration:t,e)):this._time},r.totalTime=function(t,e,i){if(a||n.wake(),!arguments.length)return this._totalTime;if(this._timeline){if(0>t&&!i&&(t+=this.totalDuration()),this._timeline.smoothChildTiming){this._dirty&&this.totalDuration();var s=this._totalDuration,r=this._timeline;if(t>s&&!i&&(t=s),this._startTime=(this._paused?this._pauseTime:r._time)-(this._reversed?s-t:t)/this._timeScale,r._dirty||this._uncache(!1),r._timeline)for(;r._timeline;)r._timeline._time!==(r._startTime+r._totalTime)/r._timeScale&&r.totalTime(r._totalTime,!0),r=r._timeline}this._gc&&this._enabled(!0,!1),(this._totalTime!==t||0===this._duration)&&this.render(t,e,!1)}return this},r.progress=r.totalProgress=function(t,e){return arguments.length?this.totalTime(this.duration()*t,e):this._time/this.duration()},r.startTime=function(t){return arguments.length?(t!==this._startTime&&(this._startTime=t,this.timeline&&this.timeline._sortChildren&&this.timeline.add(this,t-this._delay)),this):this._startTime},r.timeScale=function(t){if(!arguments.length)return this._timeScale;if(t=t||h,this._timeline&&this._timeline.smoothChildTiming){var e=this._pauseTime,i=e||0===e?e:this._timeline.totalTime();this._startTime=i-(i-this._startTime)*this._timeScale/t}return this._timeScale=t,this._uncache(!1)},r.reversed=function(t){return arguments.length?(t!=this._reversed&&(this._reversed=t,this.totalTime(this._timeline&&!this._timeline.smoothChildTiming?this.totalDuration()-this._totalTime:this._totalTime,!0)),this):this._reversed},r.paused=function(t){if(!arguments.length)return this._paused;if(t!=this._paused&&this._timeline){a||t||n.wake();var e=this._timeline,i=e.rawTime(),s=i-this._pauseTime;!t&&e.smoothChildTiming&&(this._startTime+=s,this._uncache(!1)),this._pauseTime=t?i:null,this._paused=t,this._active=this.isActive(),!t&&0!==s&&this._initted&&this.duration()&&this.render(e.smoothChildTiming?this._totalTime:(i-this._startTime)/this._timeScale,!0,!0)}return this._gc&&!t&&this._enabled(!0,!1),this};var R=d("core.SimpleTimeline",function(t){x.call(this,0,t),this.autoRemoveChildren=this.smoothChildTiming=!0});r=R.prototype=new x,r.constructor=R,r.kill()._gc=!1,r._first=r._last=null,r._sortChildren=!1,r.add=r.insert=function(t,e){var i,s;if(t._startTime=Number(e||0)+t._delay,t._paused&&this!==t._timeline&&(t._pauseTime=t._startTime+(this.rawTime()-t._startTime)/t._timeScale),t.timeline&&t.timeline._remove(t,!0),t.timeline=t._timeline=this,t._gc&&t._enabled(!0,!0),i=this._last,this._sortChildren)for(s=t._startTime;i&&i._startTime>s;)i=i._prev;return i?(t._next=i._next,i._next=t):(t._next=this._first,this._first=t),t._next?t._next._prev=t:this._last=t,t._prev=i,this._timeline&&this._uncache(!0),this},r._remove=function(t,e){return t.timeline===this&&(e||t._enabled(!1,!0),t.timeline=null,t._prev?t._prev._next=t._next:this._first===t&&(this._first=t._next),t._next?t._next._prev=t._prev:this._last===t&&(this._last=t._prev),this._timeline&&this._uncache(!0)),this},r.render=function(t,e,i){var s,r=this._first;for(this._totalTime=this._time=this._rawPrevTime=t;r;)s=r._next,(r._active||t>=r._startTime&&!r._paused)&&(r._reversed?r.render((r._dirty?r.totalDuration():r._totalDuration)-(t-r._startTime)*r._timeScale,e,i):r.render((t-r._startTime)*r._timeScale,e,i)),r=s},r.rawTime=function(){return a||n.wake(),this._totalTime};var D=d("TweenLite",function(e,i,s){if(x.call(this,i,s),this.render=D.prototype.render,null==e)throw"Cannot tween a null target.";this.target=e="string"!=typeof e?e:D.selector(e)||e;var r,n,a,o=e.jquery||e.length&&e!==t&&e[0]&&(e[0]===t||e[0].nodeType&&e[0].style&&!e.nodeType),l=this.vars.overwrite;if(this._overwrite=l=null==l?j[D.defaultOverwrite]:"number"==typeof l?l>>0:j[l],(o||e instanceof Array||e.push&&m(e))&&"number"!=typeof e[0])for(this._targets=a=_.call(e,0),this._propLookup=[],this._siblings=[],r=0;a.length>r;r++)n=a[r],n?"string"!=typeof n?n.length&&n!==t&&n[0]&&(n[0]===t||n[0].nodeType&&n[0].style&&!n.nodeType)?(a.splice(r--,1),this._targets=a=a.concat(_.call(n,0))):(this._siblings[r]=B(n,this,!1),1===l&&this._siblings[r].length>1&&q(n,this,null,1,this._siblings[r])):(n=a[r--]=D.selector(n),"string"==typeof n&&a.splice(r+1,1)):a.splice(r--,1);else this._propLookup={},this._siblings=B(e,this,!1),1===l&&this._siblings.length>1&&q(e,this,null,1,this._siblings);(this.vars.immediateRender||0===i&&0===this._delay&&this.vars.immediateRender!==!1)&&this.render(-this._delay,!1,!0)},!0),E=function(e){return e.length&&e!==t&&e[0]&&(e[0]===t||e[0].nodeType&&e[0].style&&!e.nodeType)},I=function(t,e){var i,s={};for(i in t)F[i]||i in e&&"x"!==i&&"y"!==i&&"width"!==i&&"height"!==i&&"className"!==i&&"border"!==i||!(!N[i]||N[i]&&N[i]._autoCSS)||(s[i]=t[i],delete t[i]);t.css=s};r=D.prototype=new x,r.constructor=D,r.kill()._gc=!1,r.ratio=0,r._firstPT=r._targets=r._overwrittenProps=r._startAt=null,r._notifyPluginsOfEnabled=!1,D.version="1.11.5",D.defaultEase=r._ease=new T(null,null,1,1),D.defaultOverwrite="auto",D.ticker=n,D.autoSleep=!0,D.selector=t.$||t.jQuery||function(e){return t.$?(D.selector=t.$,t.$(e)):t.document?t.document.getElementById("#"===e.charAt(0)?e.substr(1):e):e};var O=D._internals={isArray:m,isSelector:E},N=D._plugins={},L=D._tweenLookup={},U=0,F=O.reservedProps={ease:1,delay:1,overwrite:1,onComplete:1,onCompleteParams:1,onCompleteScope:1,useFrames:1,runBackwards:1,startAt:1,onUpdate:1,onUpdateParams:1,onUpdateScope:1,onStart:1,onStartParams:1,onStartScope:1,onReverseComplete:1,onReverseCompleteParams:1,onReverseCompleteScope:1,onRepeat:1,onRepeatParams:1,onRepeatScope:1,easeParams:1,yoyo:1,immediateRender:1,repeat:1,repeatDelay:1,data:1,paused:1,reversed:1,autoCSS:1},j={none:0,all:1,auto:2,concurrent:3,allOnStart:4,preexisting:5,"true":1,"false":0},G=x._rootFramesTimeline=new R,Q=x._rootTimeline=new R;Q._startTime=n.time,G._startTime=n.frame,Q._active=G._active=!0,x._updateRoot=function(){if(Q.render((n.time-Q._startTime)*Q._timeScale,!1,!1),G.render((n.frame-G._startTime)*G._timeScale,!1,!1),!(n.frame%120)){var t,e,i;for(i in L){for(e=L[i].tweens,t=e.length;--t>-1;)e[t]._gc&&e.splice(t,1);0===e.length&&delete L[i]}if(i=Q._first,(!i||i._paused)&&D.autoSleep&&!G._first&&1===n._listeners.tick.length){for(;i&&i._paused;)i=i._next;i||n.sleep()}}},n.addEventListener("tick",x._updateRoot);var B=function(t,e,i){var s,r,n=t._gsTweenID;if(L[n||(t._gsTweenID=n="t"+U++)]||(L[n]={target:t,tweens:[]}),e&&(s=L[n].tweens,s[r=s.length]=e,i))for(;--r>-1;)s[r]===e&&s.splice(r,1);return L[n].tweens},q=function(t,e,i,s,r){var n,a,o,l;if(1===s||s>=4){for(l=r.length,n=0;l>n;n++)if((o=r[n])!==e)o._gc||o._enabled(!1,!1)&&(a=!0);else if(5===s)break;return a}var _,u=e._startTime+h,m=[],f=0,p=0===e._duration;for(n=r.length;--n>-1;)(o=r[n])===e||o._gc||o._paused||(o._timeline!==e._timeline?(_=_||$(e,0,p),0===$(o,_,p)&&(m[f++]=o)):u>=o._startTime&&o._startTime+o.totalDuration()/o._timeScale>u&&((p||!o._initted)&&2e-10>=u-o._startTime||(m[f++]=o)));for(n=f;--n>-1;)o=m[n],2===s&&o._kill(i,t)&&(a=!0),(2!==s||!o._firstPT&&o._initted)&&o._enabled(!1,!1)&&(a=!0);return a},$=function(t,e,i){for(var s=t._timeline,r=s._timeScale,n=t._startTime;s._timeline;){if(n+=s._startTime,r*=s._timeScale,s._paused)return-100;s=s._timeline}return n/=r,n>e?n-e:i&&n===e||!t._initted&&2*h>n-e?h:(n+=t.totalDuration()/t._timeScale/r)>e+h?0:n-e-h};r._init=function(){var t,e,i,s,r=this.vars,n=this._overwrittenProps,a=this._duration,o=r.immediateRender,l=r.ease;if(r.startAt){if(this._startAt&&this._startAt.render(-1,!0),r.startAt.overwrite=0,r.startAt.immediateRender=!0,this._startAt=D.to(this.target,0,r.startAt),o)if(this._time>0)this._startAt=null;else if(0!==a)return}else if(r.runBackwards&&0!==a)if(this._startAt)this._startAt.render(-1,!0),this._startAt=null;else{i={};for(s in r)F[s]&&"autoCSS"!==s||(i[s]=r[s]);if(i.overwrite=0,i.data="isFromStart",this._startAt=D.to(this.target,0,i),r.immediateRender){if(0===this._time)return}else this._startAt.render(-1,!0)}if(this._ease=l?l instanceof T?r.easeParams instanceof Array?l.config.apply(l,r.easeParams):l:"function"==typeof l?new T(l,r.easeParams):w[l]||D.defaultEase:D.defaultEase,this._easeType=this._ease._type,this._easePower=this._ease._power,this._firstPT=null,this._targets)for(t=this._targets.length;--t>-1;)this._initProps(this._targets[t],this._propLookup[t]={},this._siblings[t],n?n[t]:null)&&(e=!0);else e=this._initProps(this.target,this._propLookup,this._siblings,n);if(e&&D._onPluginEvent("_onInitAllProps",this),n&&(this._firstPT||"function"!=typeof this.target&&this._enabled(!1,!1)),r.runBackwards)for(i=this._firstPT;i;)i.s+=i.c,i.c=-i.c,i=i._next;this._onUpdate=r.onUpdate,this._initted=!0},r._initProps=function(e,i,s,r){var n,a,o,l,h,_;if(null==e)return!1;this.vars.css||e.style&&e!==t&&e.nodeType&&N.css&&this.vars.autoCSS!==!1&&I(this.vars,e);for(n in this.vars){if(_=this.vars[n],F[n])_&&(_ instanceof Array||_.push&&m(_))&&-1!==_.join("").indexOf("{self}")&&(this.vars[n]=_=this._swapSelfInParams(_,this));else if(N[n]&&(l=new N[n])._onInitTween(e,this.vars[n],this)){for(this._firstPT=h={_next:this._firstPT,t:l,p:"setRatio",s:0,c:1,f:!0,n:n,pg:!0,pr:l._priority},a=l._overwriteProps.length;--a>-1;)i[l._overwriteProps[a]]=this._firstPT;(l._priority||l._onInitAllProps)&&(o=!0),(l._onDisable||l._onEnable)&&(this._notifyPluginsOfEnabled=!0)}else this._firstPT=i[n]=h={_next:this._firstPT,t:e,p:n,f:"function"==typeof e[n],n:n,pg:!1,pr:0},h.s=h.f?e[n.indexOf("set")||"function"!=typeof e["get"+n.substr(3)]?n:"get"+n.substr(3)]():parseFloat(e[n]),h.c="string"==typeof _&&"="===_.charAt(1)?parseInt(_.charAt(0)+"1",10)*Number(_.substr(2)):Number(_)-h.s||0;h&&h._next&&(h._next._prev=h)}return r&&this._kill(r,e)?this._initProps(e,i,s,r):this._overwrite>1&&this._firstPT&&s.length>1&&q(e,this,i,this._overwrite,s)?(this._kill(i,e),this._initProps(e,i,s,r)):o},r.render=function(t,e,i){var s,r,n,a,o=this._time,l=this._duration;if(t>=l)this._totalTime=this._time=l,this.ratio=this._ease._calcEnd?this._ease.getRatio(1):1,this._reversed||(s=!0,r="onComplete"),0===l&&(a=this._rawPrevTime,(0===t||0>a||a===h)&&a!==t&&(i=!0,a>h&&(r="onReverseComplete")),this._rawPrevTime=a=!e||t||0===a?t:h);else if(1e-7>t)this._totalTime=this._time=0,this.ratio=this._ease._calcEnd?this._ease.getRatio(0):0,(0!==o||0===l&&this._rawPrevTime>h)&&(r="onReverseComplete",s=this._reversed),0>t?(this._active=!1,0===l&&(this._rawPrevTime>=0&&(i=!0),this._rawPrevTime=a=!e||t||0===this._rawPrevTime?t:h)):this._initted||(i=!0);else if(this._totalTime=this._time=t,this._easeType){var _=t/l,u=this._easeType,m=this._easePower;(1===u||3===u&&_>=.5)&&(_=1-_),3===u&&(_*=2),1===m?_*=_:2===m?_*=_*_:3===m?_*=_*_*_:4===m&&(_*=_*_*_*_),this.ratio=1===u?1-_:2===u?_:.5>t/l?_/2:1-_/2}else this.ratio=this._ease.getRatio(t/l);if(this._time!==o||i){if(!this._initted){if(this._init(),!this._initted||this._gc)return;this._time&&!s?this.ratio=this._ease.getRatio(this._time/l):s&&this._ease._calcEnd&&(this.ratio=this._ease.getRatio(0===this._time?0:1))}for(this._active||!this._paused&&this._time!==o&&t>=0&&(this._active=!0),0===o&&(this._startAt&&(t>=0?this._startAt.render(t,e,i):r||(r="_dummyGS")),this.vars.onStart&&(0!==this._time||0===l)&&(e||this.vars.onStart.apply(this.vars.onStartScope||this,this.vars.onStartParams||g))),n=this._firstPT;n;)n.f?n.t[n.p](n.c*this.ratio+n.s):n.t[n.p]=n.c*this.ratio+n.s,n=n._next;this._onUpdate&&(0>t&&this._startAt&&this._startTime&&this._startAt.render(t,e,i),e||(this._time!==o||s)&&this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||g)),r&&(this._gc||(0>t&&this._startAt&&!this._onUpdate&&this._startTime&&this._startAt.render(t,e,i),s&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[r]&&this.vars[r].apply(this.vars[r+"Scope"]||this,this.vars[r+"Params"]||g),0===l&&this._rawPrevTime===h&&a!==h&&(this._rawPrevTime=0)))}},r._kill=function(t,e){if("all"===t&&(t=null),null==t&&(null==e||e===this.target))return this._enabled(!1,!1);e="string"!=typeof e?e||this._targets||this.target:D.selector(e)||e;var i,s,r,n,a,o,l,h;if((m(e)||E(e))&&"number"!=typeof e[0])for(i=e.length;--i>-1;)this._kill(t,e[i])&&(o=!0);else{if(this._targets){for(i=this._targets.length;--i>-1;)if(e===this._targets[i]){a=this._propLookup[i]||{},this._overwrittenProps=this._overwrittenProps||[],s=this._overwrittenProps[i]=t?this._overwrittenProps[i]||{}:"all";break}}else{if(e!==this.target)return!1;a=this._propLookup,s=this._overwrittenProps=t?this._overwrittenProps||{}:"all"}if(a){l=t||a,h=t!==s&&"all"!==s&&t!==a&&("object"!=typeof t||!t._tempKill);for(r in l)(n=a[r])&&(n.pg&&n.t._kill(l)&&(o=!0),n.pg&&0!==n.t._overwriteProps.length||(n._prev?n._prev._next=n._next:n===this._firstPT&&(this._firstPT=n._next),n._next&&(n._next._prev=n._prev),n._next=n._prev=null),delete a[r]),h&&(s[r]=1);!this._firstPT&&this._initted&&this._enabled(!1,!1)}}return o},r.invalidate=function(){return this._notifyPluginsOfEnabled&&D._onPluginEvent("_onDisable",this),this._firstPT=null,this._overwrittenProps=null,this._onUpdate=null,this._startAt=null,this._initted=this._active=this._notifyPluginsOfEnabled=!1,this._propLookup=this._targets?{}:[],this},r._enabled=function(t,e){if(a||n.wake(),t&&this._gc){var i,s=this._targets;if(s)for(i=s.length;--i>-1;)this._siblings[i]=B(s[i],this,!0);else this._siblings=B(this.target,this,!0)}return x.prototype._enabled.call(this,t,e),this._notifyPluginsOfEnabled&&this._firstPT?D._onPluginEvent(t?"_onEnable":"_onDisable",this):!1},D.to=function(t,e,i){return new D(t,e,i)},D.from=function(t,e,i){return i.runBackwards=!0,i.immediateRender=0!=i.immediateRender,new D(t,e,i)},D.fromTo=function(t,e,i,s){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,new D(t,e,s)},D.delayedCall=function(t,e,i,s,r){return new D(e,0,{delay:t,onComplete:e,onCompleteParams:i,onCompleteScope:s,onReverseComplete:e,onReverseCompleteParams:i,onReverseCompleteScope:s,immediateRender:!1,useFrames:r,overwrite:0})},D.set=function(t,e){return new D(t,0,e)},D.getTweensOf=function(t,e){if(null==t)return[];t="string"!=typeof t?t:D.selector(t)||t;var i,s,r,n;if((m(t)||E(t))&&"number"!=typeof t[0]){for(i=t.length,s=[];--i>-1;)s=s.concat(D.getTweensOf(t[i],e));for(i=s.length;--i>-1;)for(n=s[i],r=i;--r>-1;)n===s[r]&&s.splice(i,1)}else for(s=B(t).concat(),i=s.length;--i>-1;)(s[i]._gc||e&&!s[i].isActive())&&s.splice(i,1);return s},D.killTweensOf=D.killDelayedCallsTo=function(t,e,i){"object"==typeof e&&(i=e,e=!1);for(var s=D.getTweensOf(t,e),r=s.length;--r>-1;)s[r]._kill(i,t)};var M=d("plugins.TweenPlugin",function(t,e){this._overwriteProps=(t||"").split(","),this._propName=this._overwriteProps[0],this._priority=e||0,this._super=M.prototype},!0);if(r=M.prototype,M.version="1.10.1",M.API=2,r._firstPT=null,r._addTween=function(t,e,i,s,r,n){var a,o;return null!=s&&(a="number"==typeof s||"="!==s.charAt(1)?Number(s)-i:parseInt(s.charAt(0)+"1",10)*Number(s.substr(2)))?(this._firstPT=o={_next:this._firstPT,t:t,p:e,s:i,c:a,f:"function"==typeof t[e],n:r||e,r:n},o._next&&(o._next._prev=o),o):void 0},r.setRatio=function(t){for(var e,i=this._firstPT,s=1e-6;i;)e=i.c*t+i.s,i.r?e=0|e+(e>0?.5:-.5):s>e&&e>-s&&(e=0),i.f?i.t[i.p](e):i.t[i.p]=e,i=i._next},r._kill=function(t){var e,i=this._overwriteProps,s=this._firstPT;if(null!=t[this._propName])this._overwriteProps=[];else for(e=i.length;--e>-1;)null!=t[i[e]]&&i.splice(e,1);for(;s;)null!=t[s.n]&&(s._next&&(s._next._prev=s._prev),s._prev?(s._prev._next=s._next,s._prev=null):this._firstPT===s&&(this._firstPT=s._next)),s=s._next;return!1},r._roundProps=function(t,e){for(var i=this._firstPT;i;)(t[this._propName]||null!=i.n&&t[i.n.split(this._propName+"_").join("")])&&(i.r=e),i=i._next},D._onPluginEvent=function(t,e){var i,s,r,n,a,o=e._firstPT;if("_onInitAllProps"===t){for(;o;){for(a=o._next,s=r;s&&s.pr>o.pr;)s=s._next;(o._prev=s?s._prev:n)?o._prev._next=o:r=o,(o._next=s)?s._prev=o:n=o,o=a}o=e._firstPT=r}for(;o;)o.pg&&"function"==typeof o.t[t]&&o.t[t]()&&(i=!0),o=o._next;return i},M.activate=function(t){for(var e=t.length;--e>-1;)t[e].API===M.API&&(N[(new t[e])._propName]=t[e]);return!0},c.plugin=function(t){if(!(t&&t.propName&&t.init&&t.API))throw"illegal plugin definition.";var e,i=t.propName,s=t.priority||0,r=t.overwriteProps,n={init:"_onInitTween",set:"setRatio",kill:"_kill",round:"_roundProps",initAll:"_onInitAllProps"},a=d("plugins."+i.charAt(0).toUpperCase()+i.substr(1)+"Plugin",function(){M.call(this,i,s),this._overwriteProps=r||[]},t.global===!0),o=a.prototype=new M(i);o.constructor=a,a.API=t.API;for(e in n)"function"==typeof t[e]&&(o[n[e]]=t[e]);return a.version=t.version,M.activate([a]),a},i=t._gsQueue){for(s=0;i.length>s;s++)i[s]();for(r in f)f[r].func||t.console.log("GSAP encountered missing dependency: com.greensock."+r)}a=!1}})(window);
/*!
 * VERSION: 1.11.5
 * DATE: 2014-02-20
 * UPDATES AND DOCS AT: http://www.greensock.com
 * 
 * Includes all of the following: TweenLite, TweenMax, TimelineLite, TimelineMax, EasePack, CSSPlugin, RoundPropsPlugin, BezierPlugin, AttrPlugin, DirectionalRotationPlugin
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 **/
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";window._gsDefine("TweenMax",["core.Animation","core.SimpleTimeline","TweenLite"],function(t,e,i){var s=[].slice,r=function(t,e,s){i.call(this,t,e,s),this._cycle=0,this._yoyo=this.vars.yoyo===!0,this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._dirty=!0,this.render=r.prototype.render},n=1e-10,a=i._internals.isSelector,o=i._internals.isArray,h=r.prototype=i.to({},.1,{}),l=[];r.version="1.11.5",h.constructor=r,h.kill()._gc=!1,r.killTweensOf=r.killDelayedCallsTo=i.killTweensOf,r.getTweensOf=i.getTweensOf,r.ticker=i.ticker,h.invalidate=function(){return this._yoyo=this.vars.yoyo===!0,this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._uncache(!0),i.prototype.invalidate.call(this)},h.updateTo=function(t,e){var s,r=this.ratio;e&&this._startTime<this._timeline._time&&(this._startTime=this._timeline._time,this._uncache(!1),this._gc?this._enabled(!0,!1):this._timeline.insert(this,this._startTime-this._delay));for(s in t)this.vars[s]=t[s];if(this._initted)if(e)this._initted=!1;else if(this._gc&&this._enabled(!0,!1),this._notifyPluginsOfEnabled&&this._firstPT&&i._onPluginEvent("_onDisable",this),this._time/this._duration>.998){var n=this._time;this.render(0,!0,!1),this._initted=!1,this.render(n,!0,!1)}else if(this._time>0){this._initted=!1,this._init();for(var a,o=1/(1-r),h=this._firstPT;h;)a=h.s+h.c,h.c*=o,h.s=a-h.c,h=h._next}return this},h.render=function(t,e,i){this._initted||0===this._duration&&this.vars.repeat&&this.invalidate();var s,r,a,o,h,_,u,p,c=this._dirty?this.totalDuration():this._totalDuration,f=this._time,m=this._totalTime,d=this._cycle,g=this._duration;if(t>=c?(this._totalTime=c,this._cycle=this._repeat,this._yoyo&&0!==(1&this._cycle)?(this._time=0,this.ratio=this._ease._calcEnd?this._ease.getRatio(0):0):(this._time=g,this.ratio=this._ease._calcEnd?this._ease.getRatio(1):1),this._reversed||(s=!0,r="onComplete"),0===g&&(p=this._rawPrevTime,(0===t||0>p||p===n)&&p!==t&&(i=!0,p>n&&(r="onReverseComplete")),this._rawPrevTime=p=!e||t||0===p?t:n)):1e-7>t?(this._totalTime=this._time=this._cycle=0,this.ratio=this._ease._calcEnd?this._ease.getRatio(0):0,(0!==m||0===g&&this._rawPrevTime>n)&&(r="onReverseComplete",s=this._reversed),0>t?(this._active=!1,0===g&&(this._rawPrevTime>=0&&(i=!0),this._rawPrevTime=p=!e||t||0===this._rawPrevTime?t:n)):this._initted||(i=!0)):(this._totalTime=this._time=t,0!==this._repeat&&(o=g+this._repeatDelay,this._cycle=this._totalTime/o>>0,0!==this._cycle&&this._cycle===this._totalTime/o&&this._cycle--,this._time=this._totalTime-this._cycle*o,this._yoyo&&0!==(1&this._cycle)&&(this._time=g-this._time),this._time>g?this._time=g:0>this._time&&(this._time=0)),this._easeType?(h=this._time/g,_=this._easeType,u=this._easePower,(1===_||3===_&&h>=.5)&&(h=1-h),3===_&&(h*=2),1===u?h*=h:2===u?h*=h*h:3===u?h*=h*h*h:4===u&&(h*=h*h*h*h),this.ratio=1===_?1-h:2===_?h:.5>this._time/g?h/2:1-h/2):this.ratio=this._ease.getRatio(this._time/g)),f===this._time&&!i&&d===this._cycle)return m!==this._totalTime&&this._onUpdate&&(e||this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||l)),void 0;if(!this._initted){if(this._init(),!this._initted||this._gc)return;this._time&&!s?this.ratio=this._ease.getRatio(this._time/g):s&&this._ease._calcEnd&&(this.ratio=this._ease.getRatio(0===this._time?0:1))}for(this._active||!this._paused&&this._time!==f&&t>=0&&(this._active=!0),0===m&&(this._startAt&&(t>=0?this._startAt.render(t,e,i):r||(r="_dummyGS")),this.vars.onStart&&(0!==this._totalTime||0===g)&&(e||this.vars.onStart.apply(this.vars.onStartScope||this,this.vars.onStartParams||l))),a=this._firstPT;a;)a.f?a.t[a.p](a.c*this.ratio+a.s):a.t[a.p]=a.c*this.ratio+a.s,a=a._next;this._onUpdate&&(0>t&&this._startAt&&this._startTime&&this._startAt.render(t,e,i),e||(this._totalTime!==m||s)&&this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||l)),this._cycle!==d&&(e||this._gc||this.vars.onRepeat&&this.vars.onRepeat.apply(this.vars.onRepeatScope||this,this.vars.onRepeatParams||l)),r&&(this._gc||(0>t&&this._startAt&&!this._onUpdate&&this._startTime&&this._startAt.render(t,e,i),s&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[r]&&this.vars[r].apply(this.vars[r+"Scope"]||this,this.vars[r+"Params"]||l),0===g&&this._rawPrevTime===n&&p!==n&&(this._rawPrevTime=0)))},r.to=function(t,e,i){return new r(t,e,i)},r.from=function(t,e,i){return i.runBackwards=!0,i.immediateRender=0!=i.immediateRender,new r(t,e,i)},r.fromTo=function(t,e,i,s){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,new r(t,e,s)},r.staggerTo=r.allTo=function(t,e,n,h,_,u,p){h=h||0;var c,f,m,d,g=n.delay||0,v=[],y=function(){n.onComplete&&n.onComplete.apply(n.onCompleteScope||this,arguments),_.apply(p||this,u||l)};for(o(t)||("string"==typeof t&&(t=i.selector(t)||t),a(t)&&(t=s.call(t,0))),c=t.length,m=0;c>m;m++){f={};for(d in n)f[d]=n[d];f.delay=g,m===c-1&&_&&(f.onComplete=y),v[m]=new r(t[m],e,f),g+=h}return v},r.staggerFrom=r.allFrom=function(t,e,i,s,n,a,o){return i.runBackwards=!0,i.immediateRender=0!=i.immediateRender,r.staggerTo(t,e,i,s,n,a,o)},r.staggerFromTo=r.allFromTo=function(t,e,i,s,n,a,o,h){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,r.staggerTo(t,e,s,n,a,o,h)},r.delayedCall=function(t,e,i,s,n){return new r(e,0,{delay:t,onComplete:e,onCompleteParams:i,onCompleteScope:s,onReverseComplete:e,onReverseCompleteParams:i,onReverseCompleteScope:s,immediateRender:!1,useFrames:n,overwrite:0})},r.set=function(t,e){return new r(t,0,e)},r.isTweening=function(t){return i.getTweensOf(t,!0).length>0};var _=function(t,e){for(var s=[],r=0,n=t._first;n;)n instanceof i?s[r++]=n:(e&&(s[r++]=n),s=s.concat(_(n,e)),r=s.length),n=n._next;return s},u=r.getAllTweens=function(e){return _(t._rootTimeline,e).concat(_(t._rootFramesTimeline,e))};r.killAll=function(t,i,s,r){null==i&&(i=!0),null==s&&(s=!0);var n,a,o,h=u(0!=r),l=h.length,_=i&&s&&r;for(o=0;l>o;o++)a=h[o],(_||a instanceof e||(n=a.target===a.vars.onComplete)&&s||i&&!n)&&(t?a.totalTime(a.totalDuration()):a._enabled(!1,!1))},r.killChildTweensOf=function(t,e){if(null!=t){var n,h,l,_,u,p=i._tweenLookup;if("string"==typeof t&&(t=i.selector(t)||t),a(t)&&(t=s.call(t,0)),o(t))for(_=t.length;--_>-1;)r.killChildTweensOf(t[_],e);else{n=[];for(l in p)for(h=p[l].target.parentNode;h;)h===t&&(n=n.concat(p[l].tweens)),h=h.parentNode;for(u=n.length,_=0;u>_;_++)e&&n[_].totalTime(n[_].totalDuration()),n[_]._enabled(!1,!1)}}};var p=function(t,i,s,r){i=i!==!1,s=s!==!1,r=r!==!1;for(var n,a,o=u(r),h=i&&s&&r,l=o.length;--l>-1;)a=o[l],(h||a instanceof e||(n=a.target===a.vars.onComplete)&&s||i&&!n)&&a.paused(t)};return r.pauseAll=function(t,e,i){p(!0,t,e,i)},r.resumeAll=function(t,e,i){p(!1,t,e,i)},r.globalTimeScale=function(e){var s=t._rootTimeline,r=i.ticker.time;return arguments.length?(e=e||n,s._startTime=r-(r-s._startTime)*s._timeScale/e,s=t._rootFramesTimeline,r=i.ticker.frame,s._startTime=r-(r-s._startTime)*s._timeScale/e,s._timeScale=t._rootTimeline._timeScale=e,e):s._timeScale},h.progress=function(t){return arguments.length?this.totalTime(this.duration()*(this._yoyo&&0!==(1&this._cycle)?1-t:t)+this._cycle*(this._duration+this._repeatDelay),!1):this._time/this.duration()},h.totalProgress=function(t){return arguments.length?this.totalTime(this.totalDuration()*t,!1):this._totalTime/this.totalDuration()},h.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),t>this._duration&&(t=this._duration),this._yoyo&&0!==(1&this._cycle)?t=this._duration-t+this._cycle*(this._duration+this._repeatDelay):0!==this._repeat&&(t+=this._cycle*(this._duration+this._repeatDelay)),this.totalTime(t,e)):this._time},h.duration=function(e){return arguments.length?t.prototype.duration.call(this,e):this._duration},h.totalDuration=function(t){return arguments.length?-1===this._repeat?this:this.duration((t-this._repeat*this._repeatDelay)/(this._repeat+1)):(this._dirty&&(this._totalDuration=-1===this._repeat?999999999999:this._duration*(this._repeat+1)+this._repeatDelay*this._repeat,this._dirty=!1),this._totalDuration)},h.repeat=function(t){return arguments.length?(this._repeat=t,this._uncache(!0)):this._repeat},h.repeatDelay=function(t){return arguments.length?(this._repeatDelay=t,this._uncache(!0)):this._repeatDelay},h.yoyo=function(t){return arguments.length?(this._yoyo=t,this):this._yoyo},r},!0),window._gsDefine("TimelineLite",["core.Animation","core.SimpleTimeline","TweenLite"],function(t,e,i){var s=function(t){e.call(this,t),this._labels={},this.autoRemoveChildren=this.vars.autoRemoveChildren===!0,this.smoothChildTiming=this.vars.smoothChildTiming===!0,this._sortChildren=!0,this._onUpdate=this.vars.onUpdate;var i,s,r=this.vars;for(s in r)i=r[s],a(i)&&-1!==i.join("").indexOf("{self}")&&(r[s]=this._swapSelfInParams(i));a(r.tweens)&&this.add(r.tweens,0,r.align,r.stagger)},r=1e-10,n=i._internals.isSelector,a=i._internals.isArray,o=[],h=function(t){var e,i={};for(e in t)i[e]=t[e];return i},l=function(t,e,i,s){t._timeline.pause(t._startTime),e&&e.apply(s||t._timeline,i||o)},_=o.slice,u=s.prototype=new e;return s.version="1.11.5",u.constructor=s,u.kill()._gc=!1,u.to=function(t,e,s,r){return e?this.add(new i(t,e,s),r):this.set(t,s,r)},u.from=function(t,e,s,r){return this.add(i.from(t,e,s),r)},u.fromTo=function(t,e,s,r,n){return e?this.add(i.fromTo(t,e,s,r),n):this.set(t,r,n)},u.staggerTo=function(t,e,r,a,o,l,u,p){var c,f=new s({onComplete:l,onCompleteParams:u,onCompleteScope:p,smoothChildTiming:this.smoothChildTiming});for("string"==typeof t&&(t=i.selector(t)||t),n(t)&&(t=_.call(t,0)),a=a||0,c=0;t.length>c;c++)r.startAt&&(r.startAt=h(r.startAt)),f.to(t[c],e,h(r),c*a);return this.add(f,o)},u.staggerFrom=function(t,e,i,s,r,n,a,o){return i.immediateRender=0!=i.immediateRender,i.runBackwards=!0,this.staggerTo(t,e,i,s,r,n,a,o)},u.staggerFromTo=function(t,e,i,s,r,n,a,o,h){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,this.staggerTo(t,e,s,r,n,a,o,h)},u.call=function(t,e,s,r){return this.add(i.delayedCall(0,t,e,s),r)},u.set=function(t,e,s){return s=this._parseTimeOrLabel(s,0,!0),null==e.immediateRender&&(e.immediateRender=s===this._time&&!this._paused),this.add(new i(t,0,e),s)},s.exportRoot=function(t,e){t=t||{},null==t.smoothChildTiming&&(t.smoothChildTiming=!0);var r,n,a=new s(t),o=a._timeline;for(null==e&&(e=!0),o._remove(a,!0),a._startTime=0,a._rawPrevTime=a._time=a._totalTime=o._time,r=o._first;r;)n=r._next,e&&r instanceof i&&r.target===r.vars.onComplete||a.add(r,r._startTime-r._delay),r=n;return o.add(a,0),a},u.add=function(r,n,o,h){var l,_,u,p,c,f;if("number"!=typeof n&&(n=this._parseTimeOrLabel(n,0,!0,r)),!(r instanceof t)){if(r instanceof Array||r&&r.push&&a(r)){for(o=o||"normal",h=h||0,l=n,_=r.length,u=0;_>u;u++)a(p=r[u])&&(p=new s({tweens:p})),this.add(p,l),"string"!=typeof p&&"function"!=typeof p&&("sequence"===o?l=p._startTime+p.totalDuration()/p._timeScale:"start"===o&&(p._startTime-=p.delay())),l+=h;return this._uncache(!0)}if("string"==typeof r)return this.addLabel(r,n);if("function"!=typeof r)throw"Cannot add "+r+" into the timeline; it is not a tween, timeline, function, or string.";r=i.delayedCall(0,r)}if(e.prototype.add.call(this,r,n),(this._gc||this._time===this._duration)&&!this._paused&&this._duration<this.duration())for(c=this,f=c.rawTime()>r._startTime;c._timeline;)f&&c._timeline.smoothChildTiming?c.totalTime(c._totalTime,!0):c._gc&&c._enabled(!0,!1),c=c._timeline;return this},u.remove=function(e){if(e instanceof t)return this._remove(e,!1);if(e instanceof Array||e&&e.push&&a(e)){for(var i=e.length;--i>-1;)this.remove(e[i]);return this}return"string"==typeof e?this.removeLabel(e):this.kill(null,e)},u._remove=function(t,i){e.prototype._remove.call(this,t,i);var s=this._last;return s?this._time>s._startTime+s._totalDuration/s._timeScale&&(this._time=this.duration(),this._totalTime=this._totalDuration):this._time=this._totalTime=this._duration=this._totalDuration=0,this},u.append=function(t,e){return this.add(t,this._parseTimeOrLabel(null,e,!0,t))},u.insert=u.insertMultiple=function(t,e,i,s){return this.add(t,e||0,i,s)},u.appendMultiple=function(t,e,i,s){return this.add(t,this._parseTimeOrLabel(null,e,!0,t),i,s)},u.addLabel=function(t,e){return this._labels[t]=this._parseTimeOrLabel(e),this},u.addPause=function(t,e,i,s){return this.call(l,["{self}",e,i,s],this,t)},u.removeLabel=function(t){return delete this._labels[t],this},u.getLabelTime=function(t){return null!=this._labels[t]?this._labels[t]:-1},u._parseTimeOrLabel=function(e,i,s,r){var n;if(r instanceof t&&r.timeline===this)this.remove(r);else if(r&&(r instanceof Array||r.push&&a(r)))for(n=r.length;--n>-1;)r[n]instanceof t&&r[n].timeline===this&&this.remove(r[n]);if("string"==typeof i)return this._parseTimeOrLabel(i,s&&"number"==typeof e&&null==this._labels[i]?e-this.duration():0,s);if(i=i||0,"string"!=typeof e||!isNaN(e)&&null==this._labels[e])null==e&&(e=this.duration());else{if(n=e.indexOf("="),-1===n)return null==this._labels[e]?s?this._labels[e]=this.duration()+i:i:this._labels[e]+i;i=parseInt(e.charAt(n-1)+"1",10)*Number(e.substr(n+1)),e=n>1?this._parseTimeOrLabel(e.substr(0,n-1),0,s):this.duration()}return Number(e)+i},u.seek=function(t,e){return this.totalTime("number"==typeof t?t:this._parseTimeOrLabel(t),e!==!1)},u.stop=function(){return this.paused(!0)},u.gotoAndPlay=function(t,e){return this.play(t,e)},u.gotoAndStop=function(t,e){return this.pause(t,e)},u.render=function(t,e,i){this._gc&&this._enabled(!0,!1);var s,n,a,h,l,_=this._dirty?this.totalDuration():this._totalDuration,u=this._time,p=this._startTime,c=this._timeScale,f=this._paused;if(t>=_?(this._totalTime=this._time=_,this._reversed||this._hasPausedChild()||(n=!0,h="onComplete",0===this._duration&&(0===t||0>this._rawPrevTime||this._rawPrevTime===r)&&this._rawPrevTime!==t&&this._first&&(l=!0,this._rawPrevTime>r&&(h="onReverseComplete"))),this._rawPrevTime=this._duration||!e||t||0===this._rawPrevTime?t:r,t=_+1e-4):1e-7>t?(this._totalTime=this._time=0,(0!==u||0===this._duration&&(this._rawPrevTime>r||0>t&&this._rawPrevTime>=0))&&(h="onReverseComplete",n=this._reversed),0>t?(this._active=!1,0===this._duration&&this._rawPrevTime>=0&&this._first&&(l=!0),this._rawPrevTime=t):(this._rawPrevTime=this._duration||!e||t||0===this._rawPrevTime?t:r,t=0,this._initted||(l=!0))):this._totalTime=this._time=this._rawPrevTime=t,this._time!==u&&this._first||i||l){if(this._initted||(this._initted=!0),this._active||!this._paused&&this._time!==u&&t>0&&(this._active=!0),0===u&&this.vars.onStart&&0!==this._time&&(e||this.vars.onStart.apply(this.vars.onStartScope||this,this.vars.onStartParams||o)),this._time>=u)for(s=this._first;s&&(a=s._next,!this._paused||f);)(s._active||s._startTime<=this._time&&!s._paused&&!s._gc)&&(s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=a;else for(s=this._last;s&&(a=s._prev,!this._paused||f);)(s._active||u>=s._startTime&&!s._paused&&!s._gc)&&(s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=a;this._onUpdate&&(e||this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||o)),h&&(this._gc||(p===this._startTime||c!==this._timeScale)&&(0===this._time||_>=this.totalDuration())&&(n&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[h]&&this.vars[h].apply(this.vars[h+"Scope"]||this,this.vars[h+"Params"]||o)))}},u._hasPausedChild=function(){for(var t=this._first;t;){if(t._paused||t instanceof s&&t._hasPausedChild())return!0;t=t._next}return!1},u.getChildren=function(t,e,s,r){r=r||-9999999999;for(var n=[],a=this._first,o=0;a;)r>a._startTime||(a instanceof i?e!==!1&&(n[o++]=a):(s!==!1&&(n[o++]=a),t!==!1&&(n=n.concat(a.getChildren(!0,e,s)),o=n.length))),a=a._next;return n},u.getTweensOf=function(t,e){for(var s=i.getTweensOf(t),r=s.length,n=[],a=0;--r>-1;)(s[r].timeline===this||e&&this._contains(s[r]))&&(n[a++]=s[r]);return n},u._contains=function(t){for(var e=t.timeline;e;){if(e===this)return!0;e=e.timeline}return!1},u.shiftChildren=function(t,e,i){i=i||0;for(var s,r=this._first,n=this._labels;r;)r._startTime>=i&&(r._startTime+=t),r=r._next;if(e)for(s in n)n[s]>=i&&(n[s]+=t);return this._uncache(!0)},u._kill=function(t,e){if(!t&&!e)return this._enabled(!1,!1);for(var i=e?this.getTweensOf(e):this.getChildren(!0,!0,!1),s=i.length,r=!1;--s>-1;)i[s]._kill(t,e)&&(r=!0);return r},u.clear=function(t){var e=this.getChildren(!1,!0,!0),i=e.length;for(this._time=this._totalTime=0;--i>-1;)e[i]._enabled(!1,!1);return t!==!1&&(this._labels={}),this._uncache(!0)},u.invalidate=function(){for(var t=this._first;t;)t.invalidate(),t=t._next;return this},u._enabled=function(t,i){if(t===this._gc)for(var s=this._first;s;)s._enabled(t,!0),s=s._next;return e.prototype._enabled.call(this,t,i)},u.duration=function(t){return arguments.length?(0!==this.duration()&&0!==t&&this.timeScale(this._duration/t),this):(this._dirty&&this.totalDuration(),this._duration)},u.totalDuration=function(t){if(!arguments.length){if(this._dirty){for(var e,i,s=0,r=this._last,n=999999999999;r;)e=r._prev,r._dirty&&r.totalDuration(),r._startTime>n&&this._sortChildren&&!r._paused?this.add(r,r._startTime-r._delay):n=r._startTime,0>r._startTime&&!r._paused&&(s-=r._startTime,this._timeline.smoothChildTiming&&(this._startTime+=r._startTime/this._timeScale),this.shiftChildren(-r._startTime,!1,-9999999999),n=0),i=r._startTime+r._totalDuration/r._timeScale,i>s&&(s=i),r=e;this._duration=this._totalDuration=s,this._dirty=!1}return this._totalDuration}return 0!==this.totalDuration()&&0!==t&&this.timeScale(this._totalDuration/t),this},u.usesFrames=function(){for(var e=this._timeline;e._timeline;)e=e._timeline;return e===t._rootFramesTimeline},u.rawTime=function(){return this._paused?this._totalTime:(this._timeline.rawTime()-this._startTime)*this._timeScale},s},!0),window._gsDefine("TimelineMax",["TimelineLite","TweenLite","easing.Ease"],function(t,e,i){var s=function(e){t.call(this,e),this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._cycle=0,this._yoyo=this.vars.yoyo===!0,this._dirty=!0},r=1e-10,n=[],a=new i(null,null,1,0),o=s.prototype=new t;return o.constructor=s,o.kill()._gc=!1,s.version="1.11.5",o.invalidate=function(){return this._yoyo=this.vars.yoyo===!0,this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._uncache(!0),t.prototype.invalidate.call(this)},o.addCallback=function(t,i,s,r){return this.add(e.delayedCall(0,t,s,r),i)},o.removeCallback=function(t,e){if(t)if(null==e)this._kill(null,t);else for(var i=this.getTweensOf(t,!1),s=i.length,r=this._parseTimeOrLabel(e);--s>-1;)i[s]._startTime===r&&i[s]._enabled(!1,!1);return this},o.tweenTo=function(t,i){i=i||{};var s,r,o,h={ease:a,overwrite:2,useFrames:this.usesFrames(),immediateRender:!1};for(r in i)h[r]=i[r];return h.time=this._parseTimeOrLabel(t),s=Math.abs(Number(h.time)-this._time)/this._timeScale||.001,o=new e(this,s,h),h.onStart=function(){o.target.paused(!0),o.vars.time!==o.target.time()&&s===o.duration()&&o.duration(Math.abs(o.vars.time-o.target.time())/o.target._timeScale),i.onStart&&i.onStart.apply(i.onStartScope||o,i.onStartParams||n)},o},o.tweenFromTo=function(t,e,i){i=i||{},t=this._parseTimeOrLabel(t),i.startAt={onComplete:this.seek,onCompleteParams:[t],onCompleteScope:this},i.immediateRender=i.immediateRender!==!1;var s=this.tweenTo(e,i);return s.duration(Math.abs(s.vars.time-t)/this._timeScale||.001)},o.render=function(t,e,i){this._gc&&this._enabled(!0,!1);var s,a,o,h,l,_,u=this._dirty?this.totalDuration():this._totalDuration,p=this._duration,c=this._time,f=this._totalTime,m=this._startTime,d=this._timeScale,g=this._rawPrevTime,v=this._paused,y=this._cycle;if(t>=u?(this._locked||(this._totalTime=u,this._cycle=this._repeat),this._reversed||this._hasPausedChild()||(a=!0,h="onComplete",0===this._duration&&(0===t||0>g||g===r)&&g!==t&&this._first&&(l=!0,g>r&&(h="onReverseComplete"))),this._rawPrevTime=this._duration||!e||t||0===this._rawPrevTime?t:r,this._yoyo&&0!==(1&this._cycle)?this._time=t=0:(this._time=p,t=p+1e-4)):1e-7>t?(this._locked||(this._totalTime=this._cycle=0),this._time=0,(0!==c||0===p&&(g>r||0>t&&g>=0)&&!this._locked)&&(h="onReverseComplete",a=this._reversed),0>t?(this._active=!1,0===p&&g>=0&&this._first&&(l=!0),this._rawPrevTime=t):(this._rawPrevTime=p||!e||t||0===this._rawPrevTime?t:r,t=0,this._initted||(l=!0))):(0===p&&0>g&&(l=!0),this._time=this._rawPrevTime=t,this._locked||(this._totalTime=t,0!==this._repeat&&(_=p+this._repeatDelay,this._cycle=this._totalTime/_>>0,0!==this._cycle&&this._cycle===this._totalTime/_&&this._cycle--,this._time=this._totalTime-this._cycle*_,this._yoyo&&0!==(1&this._cycle)&&(this._time=p-this._time),this._time>p?(this._time=p,t=p+1e-4):0>this._time?this._time=t=0:t=this._time))),this._cycle!==y&&!this._locked){var T=this._yoyo&&0!==(1&y),w=T===(this._yoyo&&0!==(1&this._cycle)),x=this._totalTime,b=this._cycle,P=this._rawPrevTime,S=this._time;if(this._totalTime=y*p,y>this._cycle?T=!T:this._totalTime+=p,this._time=c,this._rawPrevTime=0===p?g-1e-4:g,this._cycle=y,this._locked=!0,c=T?0:p,this.render(c,e,0===p),e||this._gc||this.vars.onRepeat&&this.vars.onRepeat.apply(this.vars.onRepeatScope||this,this.vars.onRepeatParams||n),w&&(c=T?p+1e-4:-1e-4,this.render(c,!0,!1)),this._locked=!1,this._paused&&!v)return;this._time=S,this._totalTime=x,this._cycle=b,this._rawPrevTime=P}if(!(this._time!==c&&this._first||i||l))return f!==this._totalTime&&this._onUpdate&&(e||this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||n)),void 0;if(this._initted||(this._initted=!0),this._active||!this._paused&&this._totalTime!==f&&t>0&&(this._active=!0),0===f&&this.vars.onStart&&0!==this._totalTime&&(e||this.vars.onStart.apply(this.vars.onStartScope||this,this.vars.onStartParams||n)),this._time>=c)for(s=this._first;s&&(o=s._next,!this._paused||v);)(s._active||s._startTime<=this._time&&!s._paused&&!s._gc)&&(s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=o;else for(s=this._last;s&&(o=s._prev,!this._paused||v);)(s._active||c>=s._startTime&&!s._paused&&!s._gc)&&(s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=o;this._onUpdate&&(e||this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||n)),h&&(this._locked||this._gc||(m===this._startTime||d!==this._timeScale)&&(0===this._time||u>=this.totalDuration())&&(a&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[h]&&this.vars[h].apply(this.vars[h+"Scope"]||this,this.vars[h+"Params"]||n)))},o.getActive=function(t,e,i){null==t&&(t=!0),null==e&&(e=!0),null==i&&(i=!1);var s,r,n=[],a=this.getChildren(t,e,i),o=0,h=a.length;for(s=0;h>s;s++)r=a[s],r.isActive()&&(n[o++]=r);return n},o.getLabelAfter=function(t){t||0!==t&&(t=this._time);var e,i=this.getLabelsArray(),s=i.length;for(e=0;s>e;e++)if(i[e].time>t)return i[e].name;return null},o.getLabelBefore=function(t){null==t&&(t=this._time);for(var e=this.getLabelsArray(),i=e.length;--i>-1;)if(t>e[i].time)return e[i].name;return null},o.getLabelsArray=function(){var t,e=[],i=0;for(t in this._labels)e[i++]={time:this._labels[t],name:t};return e.sort(function(t,e){return t.time-e.time}),e},o.progress=function(t){return arguments.length?this.totalTime(this.duration()*(this._yoyo&&0!==(1&this._cycle)?1-t:t)+this._cycle*(this._duration+this._repeatDelay),!1):this._time/this.duration()},o.totalProgress=function(t){return arguments.length?this.totalTime(this.totalDuration()*t,!1):this._totalTime/this.totalDuration()},o.totalDuration=function(e){return arguments.length?-1===this._repeat?this:this.duration((e-this._repeat*this._repeatDelay)/(this._repeat+1)):(this._dirty&&(t.prototype.totalDuration.call(this),this._totalDuration=-1===this._repeat?999999999999:this._duration*(this._repeat+1)+this._repeatDelay*this._repeat),this._totalDuration)},o.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),t>this._duration&&(t=this._duration),this._yoyo&&0!==(1&this._cycle)?t=this._duration-t+this._cycle*(this._duration+this._repeatDelay):0!==this._repeat&&(t+=this._cycle*(this._duration+this._repeatDelay)),this.totalTime(t,e)):this._time},o.repeat=function(t){return arguments.length?(this._repeat=t,this._uncache(!0)):this._repeat},o.repeatDelay=function(t){return arguments.length?(this._repeatDelay=t,this._uncache(!0)):this._repeatDelay},o.yoyo=function(t){return arguments.length?(this._yoyo=t,this):this._yoyo},o.currentLabel=function(t){return arguments.length?this.seek(t,!0):this.getLabelBefore(this._time+1e-8)},s},!0),function(){var t=180/Math.PI,e=[],i=[],s=[],r={},n=function(t,e,i,s){this.a=t,this.b=e,this.c=i,this.d=s,this.da=s-t,this.ca=i-t,this.ba=e-t},a=",x,y,z,left,top,right,bottom,marginTop,marginLeft,marginRight,marginBottom,paddingLeft,paddingTop,paddingRight,paddingBottom,backgroundPosition,backgroundPosition_y,",o=function(t,e,i,s){var r={a:t},n={},a={},o={c:s},h=(t+e)/2,l=(e+i)/2,_=(i+s)/2,u=(h+l)/2,p=(l+_)/2,c=(p-u)/8;return r.b=h+(t-h)/4,n.b=u+c,r.c=n.a=(r.b+n.b)/2,n.c=a.a=(u+p)/2,a.b=p-c,o.b=_+(s-_)/4,a.c=o.a=(a.b+o.b)/2,[r,n,a,o]},h=function(t,r,n,a,h){var l,_,u,p,c,f,m,d,g,v,y,T,w,x=t.length-1,b=0,P=t[0].a;for(l=0;x>l;l++)c=t[b],_=c.a,u=c.d,p=t[b+1].d,h?(y=e[l],T=i[l],w=.25*(T+y)*r/(a?.5:s[l]||.5),f=u-(u-_)*(a?.5*r:0!==y?w/y:0),m=u+(p-u)*(a?.5*r:0!==T?w/T:0),d=u-(f+((m-f)*(3*y/(y+T)+.5)/4||0))):(f=u-.5*(u-_)*r,m=u+.5*(p-u)*r,d=u-(f+m)/2),f+=d,m+=d,c.c=g=f,c.b=0!==l?P:P=c.a+.6*(c.c-c.a),c.da=u-_,c.ca=g-_,c.ba=P-_,n?(v=o(_,P,g,u),t.splice(b,1,v[0],v[1],v[2],v[3]),b+=4):b++,P=m;c=t[b],c.b=P,c.c=P+.4*(c.d-P),c.da=c.d-c.a,c.ca=c.c-c.a,c.ba=P-c.a,n&&(v=o(c.a,P,c.c,c.d),t.splice(b,1,v[0],v[1],v[2],v[3]))},l=function(t,s,r,a){var o,h,l,_,u,p,c=[];if(a)for(t=[a].concat(t),h=t.length;--h>-1;)"string"==typeof(p=t[h][s])&&"="===p.charAt(1)&&(t[h][s]=a[s]+Number(p.charAt(0)+p.substr(2)));if(o=t.length-2,0>o)return c[0]=new n(t[0][s],0,0,t[-1>o?0:1][s]),c;for(h=0;o>h;h++)l=t[h][s],_=t[h+1][s],c[h]=new n(l,0,0,_),r&&(u=t[h+2][s],e[h]=(e[h]||0)+(_-l)*(_-l),i[h]=(i[h]||0)+(u-_)*(u-_));return c[h]=new n(t[h][s],0,0,t[h+1][s]),c},_=function(t,n,o,_,u,p){var c,f,m,d,g,v,y,T,w={},x=[],b=p||t[0];u="string"==typeof u?","+u+",":a,null==n&&(n=1);for(f in t[0])x.push(f);if(t.length>1){for(T=t[t.length-1],y=!0,c=x.length;--c>-1;)if(f=x[c],Math.abs(b[f]-T[f])>.05){y=!1;break}y&&(t=t.concat(),p&&t.unshift(p),t.push(t[1]),p=t[t.length-3])}for(e.length=i.length=s.length=0,c=x.length;--c>-1;)f=x[c],r[f]=-1!==u.indexOf(","+f+","),w[f]=l(t,f,r[f],p);for(c=e.length;--c>-1;)e[c]=Math.sqrt(e[c]),i[c]=Math.sqrt(i[c]);if(!_){for(c=x.length;--c>-1;)if(r[f])for(m=w[x[c]],v=m.length-1,d=0;v>d;d++)g=m[d+1].da/i[d]+m[d].da/e[d],s[d]=(s[d]||0)+g*g;for(c=s.length;--c>-1;)s[c]=Math.sqrt(s[c])}for(c=x.length,d=o?4:1;--c>-1;)f=x[c],m=w[f],h(m,n,o,_,r[f]),y&&(m.splice(0,d),m.splice(m.length-d,d));return w},u=function(t,e,i){e=e||"soft";var s,r,a,o,h,l,_,u,p,c,f,m={},d="cubic"===e?3:2,g="soft"===e,v=[];if(g&&i&&(t=[i].concat(t)),null==t||d+1>t.length)throw"invalid Bezier data";for(p in t[0])v.push(p);for(l=v.length;--l>-1;){for(p=v[l],m[p]=h=[],c=0,u=t.length,_=0;u>_;_++)s=null==i?t[_][p]:"string"==typeof(f=t[_][p])&&"="===f.charAt(1)?i[p]+Number(f.charAt(0)+f.substr(2)):Number(f),g&&_>1&&u-1>_&&(h[c++]=(s+h[c-2])/2),h[c++]=s;for(u=c-d+1,c=0,_=0;u>_;_+=d)s=h[_],r=h[_+1],a=h[_+2],o=2===d?0:h[_+3],h[c++]=f=3===d?new n(s,r,a,o):new n(s,(2*r+s)/3,(2*r+a)/3,a);h.length=c}return m},p=function(t,e,i){for(var s,r,n,a,o,h,l,_,u,p,c,f=1/i,m=t.length;--m>-1;)for(p=t[m],n=p.a,a=p.d-n,o=p.c-n,h=p.b-n,s=r=0,_=1;i>=_;_++)l=f*_,u=1-l,s=r-(r=(l*l*a+3*u*(l*o+u*h))*l),c=m*i+_-1,e[c]=(e[c]||0)+s*s},c=function(t,e){e=e>>0||6;var i,s,r,n,a=[],o=[],h=0,l=0,_=e-1,u=[],c=[];for(i in t)p(t[i],a,e);for(r=a.length,s=0;r>s;s++)h+=Math.sqrt(a[s]),n=s%e,c[n]=h,n===_&&(l+=h,n=s/e>>0,u[n]=c,o[n]=l,h=0,c=[]);return{length:l,lengths:o,segments:u}},f=window._gsDefine.plugin({propName:"bezier",priority:-1,API:2,global:!0,init:function(t,e,i){this._target=t,e instanceof Array&&(e={values:e}),this._func={},this._round={},this._props=[],this._timeRes=null==e.timeResolution?6:parseInt(e.timeResolution,10);var s,r,n,a,o,h=e.values||[],l={},p=h[0],f=e.autoRotate||i.vars.orientToBezier;this._autoRotate=f?f instanceof Array?f:[["x","y","rotation",f===!0?0:Number(f)||0]]:null;for(s in p)this._props.push(s);for(n=this._props.length;--n>-1;)s=this._props[n],this._overwriteProps.push(s),r=this._func[s]="function"==typeof t[s],l[s]=r?t[s.indexOf("set")||"function"!=typeof t["get"+s.substr(3)]?s:"get"+s.substr(3)]():parseFloat(t[s]),o||l[s]!==h[0][s]&&(o=l);if(this._beziers="cubic"!==e.type&&"quadratic"!==e.type&&"soft"!==e.type?_(h,isNaN(e.curviness)?1:e.curviness,!1,"thruBasic"===e.type,e.correlate,o):u(h,e.type,l),this._segCount=this._beziers[s].length,this._timeRes){var m=c(this._beziers,this._timeRes);this._length=m.length,this._lengths=m.lengths,this._segments=m.segments,this._l1=this._li=this._s1=this._si=0,this._l2=this._lengths[0],this._curSeg=this._segments[0],this._s2=this._curSeg[0],this._prec=1/this._curSeg.length}if(f=this._autoRotate)for(f[0]instanceof Array||(this._autoRotate=f=[f]),n=f.length;--n>-1;)for(a=0;3>a;a++)s=f[n][a],this._func[s]="function"==typeof t[s]?t[s.indexOf("set")||"function"!=typeof t["get"+s.substr(3)]?s:"get"+s.substr(3)]:!1;return!0},set:function(e){var i,s,r,n,a,o,h,l,_,u,p=this._segCount,c=this._func,f=this._target;if(this._timeRes){if(_=this._lengths,u=this._curSeg,e*=this._length,r=this._li,e>this._l2&&p-1>r){for(l=p-1;l>r&&e>=(this._l2=_[++r]););this._l1=_[r-1],this._li=r,this._curSeg=u=this._segments[r],this._s2=u[this._s1=this._si=0]}else if(this._l1>e&&r>0){for(;r>0&&(this._l1=_[--r])>=e;);0===r&&this._l1>e?this._l1=0:r++,this._l2=_[r],this._li=r,this._curSeg=u=this._segments[r],this._s1=u[(this._si=u.length-1)-1]||0,this._s2=u[this._si]}if(i=r,e-=this._l1,r=this._si,e>this._s2&&u.length-1>r){for(l=u.length-1;l>r&&e>=(this._s2=u[++r]););this._s1=u[r-1],this._si=r}else if(this._s1>e&&r>0){for(;r>0&&(this._s1=u[--r])>=e;);0===r&&this._s1>e?this._s1=0:r++,this._s2=u[r],this._si=r}o=(r+(e-this._s1)/(this._s2-this._s1))*this._prec}else i=0>e?0:e>=1?p-1:p*e>>0,o=(e-i*(1/p))*p;for(s=1-o,r=this._props.length;--r>-1;)n=this._props[r],a=this._beziers[n][i],h=(o*o*a.da+3*s*(o*a.ca+s*a.ba))*o+a.a,this._round[n]&&(h=h+(h>0?.5:-.5)>>0),c[n]?f[n](h):f[n]=h;if(this._autoRotate){var m,d,g,v,y,T,w,x=this._autoRotate;for(r=x.length;--r>-1;)n=x[r][2],T=x[r][3]||0,w=x[r][4]===!0?1:t,a=this._beziers[x[r][0]],m=this._beziers[x[r][1]],a&&m&&(a=a[i],m=m[i],d=a.a+(a.b-a.a)*o,v=a.b+(a.c-a.b)*o,d+=(v-d)*o,v+=(a.c+(a.d-a.c)*o-v)*o,g=m.a+(m.b-m.a)*o,y=m.b+(m.c-m.b)*o,g+=(y-g)*o,y+=(m.c+(m.d-m.c)*o-y)*o,h=Math.atan2(y-g,v-d)*w+T,c[n]?f[n](h):f[n]=h)}}}),m=f.prototype;f.bezierThrough=_,f.cubicToQuadratic=o,f._autoCSS=!0,f.quadraticToCubic=function(t,e,i){return new n(t,(2*e+t)/3,(2*e+i)/3,i)},f._cssRegister=function(){var t=window._gsDefine.globals.CSSPlugin;if(t){var e=t._internals,i=e._parseToProxy,s=e._setPluginRatio,r=e.CSSPropTween;e._registerComplexSpecialProp("bezier",{parser:function(t,e,n,a,o,h){e instanceof Array&&(e={values:e}),h=new f;var l,_,u,p=e.values,c=p.length-1,m=[],d={};if(0>c)return o;for(l=0;c>=l;l++)u=i(t,p[l],a,o,h,c!==l),m[l]=u.end;for(_ in e)d[_]=e[_];return d.values=m,o=new r(t,"bezier",0,0,u.pt,2),o.data=u,o.plugin=h,o.setRatio=s,0===d.autoRotate&&(d.autoRotate=!0),!d.autoRotate||d.autoRotate instanceof Array||(l=d.autoRotate===!0?0:Number(d.autoRotate),d.autoRotate=null!=u.end.left?[["left","top","rotation",l,!1]]:null!=u.end.x?[["x","y","rotation",l,!1]]:!1),d.autoRotate&&(a._transform||a._enableTransforms(!1),u.autoRotate=a._target._gsTransform),h._onInitTween(u.proxy,d,a._tween),o
}})}},m._roundProps=function(t,e){for(var i=this._overwriteProps,s=i.length;--s>-1;)(t[i[s]]||t.bezier||t.bezierThrough)&&(this._round[i[s]]=e)},m._kill=function(t){var e,i,s=this._props;for(e in this._beziers)if(e in t)for(delete this._beziers[e],delete this._func[e],i=s.length;--i>-1;)s[i]===e&&s.splice(i,1);return this._super._kill.call(this,t)}}(),window._gsDefine("plugins.CSSPlugin",["plugins.TweenPlugin","TweenLite"],function(t,e){var i,s,r,n,a=function(){t.call(this,"css"),this._overwriteProps.length=0,this.setRatio=a.prototype.setRatio},o={},h=a.prototype=new t("css");h.constructor=a,a.version="1.11.5",a.API=2,a.defaultTransformPerspective=0,h="px",a.suffixMap={top:h,right:h,bottom:h,left:h,width:h,height:h,fontSize:h,padding:h,margin:h,perspective:h,lineHeight:""};var l,_,u,p,c,f,m=/(?:\d|\-\d|\.\d|\-\.\d)+/g,d=/(?:\d|\-\d|\.\d|\-\.\d|\+=\d|\-=\d|\+=.\d|\-=\.\d)+/g,g=/(?:\+=|\-=|\-|\b)[\d\-\.]+[a-zA-Z0-9]*(?:%|\b)/gi,v=/[^\d\-\.]/g,y=/(?:\d|\-|\+|=|#|\.)*/g,T=/opacity *= *([^)]*)/,w=/opacity:([^;]*)/,x=/alpha\(opacity *=.+?\)/i,b=/^(rgb|hsl)/,P=/([A-Z])/g,S=/-([a-z])/gi,k=/(^(?:url\(\"|url\())|(?:(\"\))$|\)$)/gi,R=function(t,e){return e.toUpperCase()},A=/(?:Left|Right|Width)/i,C=/(M11|M12|M21|M22)=[\d\-\.e]+/gi,O=/progid\:DXImageTransform\.Microsoft\.Matrix\(.+?\)/i,D=/,(?=[^\)]*(?:\(|$))/gi,M=Math.PI/180,I=180/Math.PI,E={},N=document,F=N.createElement("div"),L=N.createElement("img"),X=a._internals={_specialProps:o},z=navigator.userAgent,U=function(){var t,e=z.indexOf("Android"),i=N.createElement("div");return u=-1!==z.indexOf("Safari")&&-1===z.indexOf("Chrome")&&(-1===e||Number(z.substr(e+8,1))>3),c=u&&6>Number(z.substr(z.indexOf("Version/")+8,1)),p=-1!==z.indexOf("Firefox"),/MSIE ([0-9]{1,}[\.0-9]{0,})/.exec(z)&&(f=parseFloat(RegExp.$1)),i.innerHTML="<a style='top:1px;opacity:.55;'>a</a>",t=i.getElementsByTagName("a")[0],t?/^0.55/.test(t.style.opacity):!1}(),Y=function(t){return T.test("string"==typeof t?t:(t.currentStyle?t.currentStyle.filter:t.style.filter)||"")?parseFloat(RegExp.$1)/100:1},j=function(t){window.console&&console.log(t)},B="",q="",V=function(t,e){e=e||F;var i,s,r=e.style;if(void 0!==r[t])return t;for(t=t.charAt(0).toUpperCase()+t.substr(1),i=["O","Moz","ms","Ms","Webkit"],s=5;--s>-1&&void 0===r[i[s]+t];);return s>=0?(q=3===s?"ms":i[s],B="-"+q.toLowerCase()+"-",q+t):null},W=N.defaultView?N.defaultView.getComputedStyle:function(){},G=a.getStyle=function(t,e,i,s,r){var n;return U||"opacity"!==e?(!s&&t.style[e]?n=t.style[e]:(i=i||W(t,null))?(t=i.getPropertyValue(e.replace(P,"-$1").toLowerCase()),n=t||i.length?t:i[e]):t.currentStyle&&(n=t.currentStyle[e]),null==r||n&&"none"!==n&&"auto"!==n&&"auto auto"!==n?n:r):Y(t)},$=function(t,e,i,s,r){if("px"===s||!s)return i;if("auto"===s||!i)return 0;var n,a=A.test(e),o=t,h=F.style,l=0>i;return l&&(i=-i),"%"===s&&-1!==e.indexOf("border")?n=i/100*(a?t.clientWidth:t.clientHeight):(h.cssText="border:0 solid red;position:"+G(t,"position")+";line-height:0;","%"!==s&&o.appendChild?h[a?"borderLeftWidth":"borderTopWidth"]=i+s:(o=t.parentNode||N.body,h[a?"width":"height"]=i+s),o.appendChild(F),n=parseFloat(F[a?"offsetWidth":"offsetHeight"]),o.removeChild(F),0!==n||r||(n=$(t,e,i,s,!0))),l?-n:n},Z=function(t,e,i){if("absolute"!==G(t,"position",i))return 0;var s="left"===e?"Left":"Top",r=G(t,"margin"+s,i);return t["offset"+s]-($(t,e,parseFloat(r),r.replace(y,""))||0)},Q=function(t,e){var i,s,r={};if(e=e||W(t,null))if(i=e.length)for(;--i>-1;)r[e[i].replace(S,R)]=e.getPropertyValue(e[i]);else for(i in e)r[i]=e[i];else if(e=t.currentStyle||t.style)for(i in e)"string"==typeof i&&void 0===r[i]&&(r[i.replace(S,R)]=e[i]);return U||(r.opacity=Y(t)),s=be(t,e,!1),r.rotation=s.rotation,r.skewX=s.skewX,r.scaleX=s.scaleX,r.scaleY=s.scaleY,r.x=s.x,r.y=s.y,xe&&(r.z=s.z,r.rotationX=s.rotationX,r.rotationY=s.rotationY,r.scaleZ=s.scaleZ),r.filters&&delete r.filters,r},H=function(t,e,i,s,r){var n,a,o,h={},l=t.style;for(a in i)"cssText"!==a&&"length"!==a&&isNaN(a)&&(e[a]!==(n=i[a])||r&&r[a])&&-1===a.indexOf("Origin")&&("number"==typeof n||"string"==typeof n)&&(h[a]="auto"!==n||"left"!==a&&"top"!==a?""!==n&&"auto"!==n&&"none"!==n||"string"!=typeof e[a]||""===e[a].replace(v,"")?n:0:Z(t,a),void 0!==l[a]&&(o=new ue(l,a,l[a],o)));if(s)for(a in s)"className"!==a&&(h[a]=s[a]);return{difs:h,firstMPT:o}},K={width:["Left","Right"],height:["Top","Bottom"]},J=["marginLeft","marginRight","marginTop","marginBottom"],te=function(t,e,i){var s=parseFloat("width"===e?t.offsetWidth:t.offsetHeight),r=K[e],n=r.length;for(i=i||W(t,null);--n>-1;)s-=parseFloat(G(t,"padding"+r[n],i,!0))||0,s-=parseFloat(G(t,"border"+r[n]+"Width",i,!0))||0;return s},ee=function(t,e){(null==t||""===t||"auto"===t||"auto auto"===t)&&(t="0 0");var i=t.split(" "),s=-1!==t.indexOf("left")?"0%":-1!==t.indexOf("right")?"100%":i[0],r=-1!==t.indexOf("top")?"0%":-1!==t.indexOf("bottom")?"100%":i[1];return null==r?r="0":"center"===r&&(r="50%"),("center"===s||isNaN(parseFloat(s))&&-1===(s+"").indexOf("="))&&(s="50%"),e&&(e.oxp=-1!==s.indexOf("%"),e.oyp=-1!==r.indexOf("%"),e.oxr="="===s.charAt(1),e.oyr="="===r.charAt(1),e.ox=parseFloat(s.replace(v,"")),e.oy=parseFloat(r.replace(v,""))),s+" "+r+(i.length>2?" "+i[2]:"")},ie=function(t,e){return"string"==typeof t&&"="===t.charAt(1)?parseInt(t.charAt(0)+"1",10)*parseFloat(t.substr(2)):parseFloat(t)-parseFloat(e)},se=function(t,e){return null==t?e:"string"==typeof t&&"="===t.charAt(1)?parseInt(t.charAt(0)+"1",10)*Number(t.substr(2))+e:parseFloat(t)},re=function(t,e,i,s){var r,n,a,o,h=1e-6;return null==t?o=e:"number"==typeof t?o=t:(r=360,n=t.split("_"),a=Number(n[0].replace(v,""))*(-1===t.indexOf("rad")?1:I)-("="===t.charAt(1)?0:e),n.length&&(s&&(s[i]=e+a),-1!==t.indexOf("short")&&(a%=r,a!==a%(r/2)&&(a=0>a?a+r:a-r)),-1!==t.indexOf("_cw")&&0>a?a=(a+9999999999*r)%r-(0|a/r)*r:-1!==t.indexOf("ccw")&&a>0&&(a=(a-9999999999*r)%r-(0|a/r)*r)),o=e+a),h>o&&o>-h&&(o=0),o},ne={aqua:[0,255,255],lime:[0,255,0],silver:[192,192,192],black:[0,0,0],maroon:[128,0,0],teal:[0,128,128],blue:[0,0,255],navy:[0,0,128],white:[255,255,255],fuchsia:[255,0,255],olive:[128,128,0],yellow:[255,255,0],orange:[255,165,0],gray:[128,128,128],purple:[128,0,128],green:[0,128,0],red:[255,0,0],pink:[255,192,203],cyan:[0,255,255],transparent:[255,255,255,0]},ae=function(t,e,i){return t=0>t?t+1:t>1?t-1:t,0|255*(1>6*t?e+6*(i-e)*t:.5>t?i:2>3*t?e+6*(i-e)*(2/3-t):e)+.5},oe=function(t){var e,i,s,r,n,a;return t&&""!==t?"number"==typeof t?[t>>16,255&t>>8,255&t]:(","===t.charAt(t.length-1)&&(t=t.substr(0,t.length-1)),ne[t]?ne[t]:"#"===t.charAt(0)?(4===t.length&&(e=t.charAt(1),i=t.charAt(2),s=t.charAt(3),t="#"+e+e+i+i+s+s),t=parseInt(t.substr(1),16),[t>>16,255&t>>8,255&t]):"hsl"===t.substr(0,3)?(t=t.match(m),r=Number(t[0])%360/360,n=Number(t[1])/100,a=Number(t[2])/100,i=.5>=a?a*(n+1):a+n-a*n,e=2*a-i,t.length>3&&(t[3]=Number(t[3])),t[0]=ae(r+1/3,e,i),t[1]=ae(r,e,i),t[2]=ae(r-1/3,e,i),t):(t=t.match(m)||ne.transparent,t[0]=Number(t[0]),t[1]=Number(t[1]),t[2]=Number(t[2]),t.length>3&&(t[3]=Number(t[3])),t)):ne.black},he="(?:\\b(?:(?:rgb|rgba|hsl|hsla)\\(.+?\\))|\\B#.+?\\b";for(h in ne)he+="|"+h+"\\b";he=RegExp(he+")","gi");var le=function(t,e,i,s){if(null==t)return function(t){return t};var r,n=e?(t.match(he)||[""])[0]:"",a=t.split(n).join("").match(g)||[],o=t.substr(0,t.indexOf(a[0])),h=")"===t.charAt(t.length-1)?")":"",l=-1!==t.indexOf(" ")?" ":",",_=a.length,u=_>0?a[0].replace(m,""):"";return _?r=e?function(t){var e,p,c,f;if("number"==typeof t)t+=u;else if(s&&D.test(t)){for(f=t.replace(D,"|").split("|"),c=0;f.length>c;c++)f[c]=r(f[c]);return f.join(",")}if(e=(t.match(he)||[n])[0],p=t.split(e).join("").match(g)||[],c=p.length,_>c--)for(;_>++c;)p[c]=i?p[0|(c-1)/2]:a[c];return o+p.join(l)+l+e+h+(-1!==t.indexOf("inset")?" inset":"")}:function(t){var e,n,p;if("number"==typeof t)t+=u;else if(s&&D.test(t)){for(n=t.replace(D,"|").split("|"),p=0;n.length>p;p++)n[p]=r(n[p]);return n.join(",")}if(e=t.match(g)||[],p=e.length,_>p--)for(;_>++p;)e[p]=i?e[0|(p-1)/2]:a[p];return o+e.join(l)+h}:function(t){return t}},_e=function(t){return t=t.split(","),function(e,i,s,r,n,a,o){var h,l=(i+"").split(" ");for(o={},h=0;4>h;h++)o[t[h]]=l[h]=l[h]||l[(h-1)/2>>0];return r.parse(e,o,n,a)}},ue=(X._setPluginRatio=function(t){this.plugin.setRatio(t);for(var e,i,s,r,n=this.data,a=n.proxy,o=n.firstMPT,h=1e-6;o;)e=a[o.v],o.r?e=e>0?0|e+.5:0|e-.5:h>e&&e>-h&&(e=0),o.t[o.p]=e,o=o._next;if(n.autoRotate&&(n.autoRotate.rotation=a.rotation),1===t)for(o=n.firstMPT;o;){if(i=o.t,i.type){if(1===i.type){for(r=i.xs0+i.s+i.xs1,s=1;i.l>s;s++)r+=i["xn"+s]+i["xs"+(s+1)];i.e=r}}else i.e=i.s+i.xs0;o=o._next}},function(t,e,i,s,r){this.t=t,this.p=e,this.v=i,this.r=r,s&&(s._prev=this,this._next=s)}),pe=(X._parseToProxy=function(t,e,i,s,r,n){var a,o,h,l,_,u=s,p={},c={},f=i._transform,m=E;for(i._transform=null,E=e,s=_=i.parse(t,e,s,r),E=m,n&&(i._transform=f,u&&(u._prev=null,u._prev&&(u._prev._next=null)));s&&s!==u;){if(1>=s.type&&(o=s.p,c[o]=s.s+s.c,p[o]=s.s,n||(l=new ue(s,"s",o,l,s.r),s.c=0),1===s.type))for(a=s.l;--a>0;)h="xn"+a,o=s.p+"_"+h,c[o]=s.data[h],p[o]=s[h],n||(l=new ue(s,h,o,l,s.rxp[h]));s=s._next}return{proxy:p,end:c,firstMPT:l,pt:_}},X.CSSPropTween=function(t,e,s,r,a,o,h,l,_,u,p){this.t=t,this.p=e,this.s=s,this.c=r,this.n=h||e,t instanceof pe||n.push(this.n),this.r=l,this.type=o||0,_&&(this.pr=_,i=!0),this.b=void 0===u?s:u,this.e=void 0===p?s+r:p,a&&(this._next=a,a._prev=this)}),ce=a.parseComplex=function(t,e,i,s,r,n,a,o,h,_){i=i||n||"",a=new pe(t,e,0,0,a,_?2:1,null,!1,o,i,s),s+="";var u,p,c,f,g,v,y,T,w,x,P,S,k=i.split(", ").join(",").split(" "),R=s.split(", ").join(",").split(" "),A=k.length,C=l!==!1;for((-1!==s.indexOf(",")||-1!==i.indexOf(","))&&(k=k.join(" ").replace(D,", ").split(" "),R=R.join(" ").replace(D,", ").split(" "),A=k.length),A!==R.length&&(k=(n||"").split(" "),A=k.length),a.plugin=h,a.setRatio=_,u=0;A>u;u++)if(f=k[u],g=R[u],T=parseFloat(f),T||0===T)a.appendXtra("",T,ie(g,T),g.replace(d,""),C&&-1!==g.indexOf("px"),!0);else if(r&&("#"===f.charAt(0)||ne[f]||b.test(f)))S=","===g.charAt(g.length-1)?"),":")",f=oe(f),g=oe(g),w=f.length+g.length>6,w&&!U&&0===g[3]?(a["xs"+a.l]+=a.l?" transparent":"transparent",a.e=a.e.split(R[u]).join("transparent")):(U||(w=!1),a.appendXtra(w?"rgba(":"rgb(",f[0],g[0]-f[0],",",!0,!0).appendXtra("",f[1],g[1]-f[1],",",!0).appendXtra("",f[2],g[2]-f[2],w?",":S,!0),w&&(f=4>f.length?1:f[3],a.appendXtra("",f,(4>g.length?1:g[3])-f,S,!1)));else if(v=f.match(m)){if(y=g.match(d),!y||y.length!==v.length)return a;for(c=0,p=0;v.length>p;p++)P=v[p],x=f.indexOf(P,c),a.appendXtra(f.substr(c,x-c),Number(P),ie(y[p],P),"",C&&"px"===f.substr(x+P.length,2),0===p),c=x+P.length;a["xs"+a.l]+=f.substr(c)}else a["xs"+a.l]+=a.l?" "+f:f;if(-1!==s.indexOf("=")&&a.data){for(S=a.xs0+a.data.s,u=1;a.l>u;u++)S+=a["xs"+u]+a.data["xn"+u];a.e=S+a["xs"+u]}return a.l||(a.type=-1,a.xs0=a.e),a.xfirst||a},fe=9;for(h=pe.prototype,h.l=h.pr=0;--fe>0;)h["xn"+fe]=0,h["xs"+fe]="";h.xs0="",h._next=h._prev=h.xfirst=h.data=h.plugin=h.setRatio=h.rxp=null,h.appendXtra=function(t,e,i,s,r,n){var a=this,o=a.l;return a["xs"+o]+=n&&o?" "+t:t||"",i||0===o||a.plugin?(a.l++,a.type=a.setRatio?2:1,a["xs"+a.l]=s||"",o>0?(a.data["xn"+o]=e+i,a.rxp["xn"+o]=r,a["xn"+o]=e,a.plugin||(a.xfirst=new pe(a,"xn"+o,e,i,a.xfirst||a,0,a.n,r,a.pr),a.xfirst.xs0=0),a):(a.data={s:e+i},a.rxp={},a.s=e,a.c=i,a.r=r,a)):(a["xs"+o]+=e+(s||""),a)};var me=function(t,e){e=e||{},this.p=e.prefix?V(t)||t:t,o[t]=o[this.p]=this,this.format=e.formatter||le(e.defaultValue,e.color,e.collapsible,e.multi),e.parser&&(this.parse=e.parser),this.clrs=e.color,this.multi=e.multi,this.keyword=e.keyword,this.dflt=e.defaultValue,this.pr=e.priority||0},de=X._registerComplexSpecialProp=function(t,e,i){"object"!=typeof e&&(e={parser:i});var s,r,n=t.split(","),a=e.defaultValue;for(i=i||[a],s=0;n.length>s;s++)e.prefix=0===s&&e.prefix,e.defaultValue=i[s]||a,r=new me(n[s],e)},ge=function(t){if(!o[t]){var e=t.charAt(0).toUpperCase()+t.substr(1)+"Plugin";de(t,{parser:function(t,i,s,r,n,a,h){var l=(window.GreenSockGlobals||window).com.greensock.plugins[e];return l?(l._cssRegister(),o[s].parse(t,i,s,r,n,a,h)):(j("Error: "+e+" js file not loaded."),n)}})}};h=me.prototype,h.parseComplex=function(t,e,i,s,r,n){var a,o,h,l,_,u,p=this.keyword;if(this.multi&&(D.test(i)||D.test(e)?(o=e.replace(D,"|").split("|"),h=i.replace(D,"|").split("|")):p&&(o=[e],h=[i])),h){for(l=h.length>o.length?h.length:o.length,a=0;l>a;a++)e=o[a]=o[a]||this.dflt,i=h[a]=h[a]||this.dflt,p&&(_=e.indexOf(p),u=i.indexOf(p),_!==u&&(i=-1===u?h:o,i[a]+=" "+p));e=o.join(", "),i=h.join(", ")}return ce(t,this.p,e,i,this.clrs,this.dflt,s,this.pr,r,n)},h.parse=function(t,e,i,s,n,a){return this.parseComplex(t.style,this.format(G(t,this.p,r,!1,this.dflt)),this.format(e),n,a)},a.registerSpecialProp=function(t,e,i){de(t,{parser:function(t,s,r,n,a,o){var h=new pe(t,r,0,0,a,2,r,!1,i);return h.plugin=o,h.setRatio=e(t,s,n._tween,r),h},priority:i})};var ve="scaleX,scaleY,scaleZ,x,y,z,skewX,rotation,rotationX,rotationY,perspective".split(","),ye=V("transform"),Te=B+"transform",we=V("transformOrigin"),xe=null!==V("perspective"),be=function(t,e,i,s){if(t._gsTransform&&i&&!s)return t._gsTransform;var r,n,o,h,l,_,u,p,c,f,m,d,g,v=i?t._gsTransform||{skewY:0}:{skewY:0},y=0>v.scaleX,T=2e-5,w=1e5,x=179.99,b=x*M,P=xe?parseFloat(G(t,we,e,!1,"0 0 0").split(" ")[2])||v.zOrigin||0:0;for(ye?r=G(t,Te,e,!0):t.currentStyle&&(r=t.currentStyle.filter.match(C),r=r&&4===r.length?[r[0].substr(4),Number(r[2].substr(4)),Number(r[1].substr(4)),r[3].substr(4),v.x||0,v.y||0].join(","):""),n=(r||"").match(/(?:\-|\b)[\d\-\.e]+\b/gi)||[],o=n.length;--o>-1;)h=Number(n[o]),n[o]=(l=h-(h|=0))?(0|l*w+(0>l?-.5:.5))/w+h:h;if(16===n.length){var S=n[8],k=n[9],R=n[10],A=n[12],O=n[13],D=n[14];if(v.zOrigin&&(D=-v.zOrigin,A=S*D-n[12],O=k*D-n[13],D=R*D+v.zOrigin-n[14]),!i||s||null==v.rotationX){var E,N,F,L,X,z,U,Y=n[0],j=n[1],B=n[2],q=n[3],V=n[4],W=n[5],$=n[6],Z=n[7],Q=n[11],H=Math.atan2($,R),K=-b>H||H>b;v.rotationX=H*I,H&&(L=Math.cos(-H),X=Math.sin(-H),E=V*L+S*X,N=W*L+k*X,F=$*L+R*X,S=V*-X+S*L,k=W*-X+k*L,R=$*-X+R*L,Q=Z*-X+Q*L,V=E,W=N,$=F),H=Math.atan2(S,Y),v.rotationY=H*I,H&&(z=-b>H||H>b,L=Math.cos(-H),X=Math.sin(-H),E=Y*L-S*X,N=j*L-k*X,F=B*L-R*X,k=j*X+k*L,R=B*X+R*L,Q=q*X+Q*L,Y=E,j=N,B=F),H=Math.atan2(j,W),v.rotation=H*I,H&&(U=-b>H||H>b,L=Math.cos(-H),X=Math.sin(-H),Y=Y*L+V*X,N=j*L+W*X,W=j*-X+W*L,$=B*-X+$*L,j=N),U&&K?v.rotation=v.rotationX=0:U&&z?v.rotation=v.rotationY=0:z&&K&&(v.rotationY=v.rotationX=0),v.scaleX=(0|Math.sqrt(Y*Y+j*j)*w+.5)/w,v.scaleY=(0|Math.sqrt(W*W+k*k)*w+.5)/w,v.scaleZ=(0|Math.sqrt($*$+R*R)*w+.5)/w,v.skewX=0,v.perspective=Q?1/(0>Q?-Q:Q):0,v.x=A,v.y=O,v.z=D}}else if(!(xe&&!s&&n.length&&v.x===n[4]&&v.y===n[5]&&(v.rotationX||v.rotationY)||void 0!==v.x&&"none"===G(t,"display",e))){var J=n.length>=6,te=J?n[0]:1,ee=n[1]||0,ie=n[2]||0,se=J?n[3]:1;v.x=n[4]||0,v.y=n[5]||0,_=Math.sqrt(te*te+ee*ee),u=Math.sqrt(se*se+ie*ie),p=te||ee?Math.atan2(ee,te)*I:v.rotation||0,c=ie||se?Math.atan2(ie,se)*I+p:v.skewX||0,f=_-Math.abs(v.scaleX||0),m=u-Math.abs(v.scaleY||0),Math.abs(c)>90&&270>Math.abs(c)&&(y?(_*=-1,c+=0>=p?180:-180,p+=0>=p?180:-180):(u*=-1,c+=0>=c?180:-180)),d=(p-v.rotation)%180,g=(c-v.skewX)%180,(void 0===v.skewX||f>T||-T>f||m>T||-T>m||d>-x&&x>d&&false|d*w||g>-x&&x>g&&false|g*w)&&(v.scaleX=_,v.scaleY=u,v.rotation=p,v.skewX=c),xe&&(v.rotationX=v.rotationY=v.z=0,v.perspective=parseFloat(a.defaultTransformPerspective)||0,v.scaleZ=1)}v.zOrigin=P;for(o in v)T>v[o]&&v[o]>-T&&(v[o]=0);return i&&(t._gsTransform=v),v},Pe=function(t){var e,i,s=this.data,r=-s.rotation*M,n=r+s.skewX*M,a=1e5,o=(0|Math.cos(r)*s.scaleX*a)/a,h=(0|Math.sin(r)*s.scaleX*a)/a,l=(0|Math.sin(n)*-s.scaleY*a)/a,_=(0|Math.cos(n)*s.scaleY*a)/a,u=this.t.style,p=this.t.currentStyle;if(p){i=h,h=-l,l=-i,e=p.filter,u.filter="";var c,m,d=this.t.offsetWidth,g=this.t.offsetHeight,v="absolute"!==p.position,w="progid:DXImageTransform.Microsoft.Matrix(M11="+o+", M12="+h+", M21="+l+", M22="+_,x=s.x,b=s.y;if(null!=s.ox&&(c=(s.oxp?.01*d*s.ox:s.ox)-d/2,m=(s.oyp?.01*g*s.oy:s.oy)-g/2,x+=c-(c*o+m*h),b+=m-(c*l+m*_)),v?(c=d/2,m=g/2,w+=", Dx="+(c-(c*o+m*h)+x)+", Dy="+(m-(c*l+m*_)+b)+")"):w+=", sizingMethod='auto expand')",u.filter=-1!==e.indexOf("DXImageTransform.Microsoft.Matrix(")?e.replace(O,w):w+" "+e,(0===t||1===t)&&1===o&&0===h&&0===l&&1===_&&(v&&-1===w.indexOf("Dx=0, Dy=0")||T.test(e)&&100!==parseFloat(RegExp.$1)||-1===e.indexOf("gradient("&&e.indexOf("Alpha"))&&u.removeAttribute("filter")),!v){var P,S,k,R=8>f?1:-1;for(c=s.ieOffsetX||0,m=s.ieOffsetY||0,s.ieOffsetX=Math.round((d-((0>o?-o:o)*d+(0>h?-h:h)*g))/2+x),s.ieOffsetY=Math.round((g-((0>_?-_:_)*g+(0>l?-l:l)*d))/2+b),fe=0;4>fe;fe++)S=J[fe],P=p[S],i=-1!==P.indexOf("px")?parseFloat(P):$(this.t,S,parseFloat(P),P.replace(y,""))||0,k=i!==s[S]?2>fe?-s.ieOffsetX:-s.ieOffsetY:2>fe?c-s.ieOffsetX:m-s.ieOffsetY,u[S]=(s[S]=Math.round(i-k*(0===fe||2===fe?1:R)))+"px"}}},Se=function(){var t,e,i,s,r,n,a,o,h,l,_,u,c,f,m,d,g,v,y,T,w,x,b,P=this.data,S=this.t.style,k=P.rotation*M,R=P.scaleX,A=P.scaleY,C=P.scaleZ,O=P.perspective;if(p){var D=1e-4;D>R&&R>-D&&(R=C=2e-5),D>A&&A>-D&&(A=C=2e-5),!O||P.z||P.rotationX||P.rotationY||(O=0)}if(k||P.skewX)v=Math.cos(k),y=Math.sin(k),t=v,r=y,P.skewX&&(k-=P.skewX*M,v=Math.cos(k),y=Math.sin(k)),e=-y,n=v;else{if(!(P.rotationY||P.rotationX||1!==C||O))return S[ye]="translate3d("+P.x+"px,"+P.y+"px,"+P.z+"px)"+(1!==R||1!==A?" scale("+R+","+A+")":""),void 0;t=n=1,e=r=0}_=1,i=s=a=o=h=l=u=c=f=0,m=O?-1/O:0,d=P.zOrigin,g=1e5,k=P.rotationY*M,k&&(v=Math.cos(k),y=Math.sin(k),h=_*-y,c=m*-y,i=t*y,a=r*y,_*=v,m*=v,t*=v,r*=v),k=P.rotationX*M,k&&(v=Math.cos(k),y=Math.sin(k),T=e*v+i*y,w=n*v+a*y,x=l*v+_*y,b=f*v+m*y,i=e*-y+i*v,a=n*-y+a*v,_=l*-y+_*v,m=f*-y+m*v,e=T,n=w,l=x,f=b),1!==C&&(i*=C,a*=C,_*=C,m*=C),1!==A&&(e*=A,n*=A,l*=A,f*=A),1!==R&&(t*=R,r*=R,h*=R,c*=R),d&&(u-=d,s=i*u,o=a*u,u=_*u+d),s=(T=(s+=P.x)-(s|=0))?(0|T*g+(0>T?-.5:.5))/g+s:s,o=(T=(o+=P.y)-(o|=0))?(0|T*g+(0>T?-.5:.5))/g+o:o,u=(T=(u+=P.z)-(u|=0))?(0|T*g+(0>T?-.5:.5))/g+u:u,S[ye]="matrix3d("+[(0|t*g)/g,(0|r*g)/g,(0|h*g)/g,(0|c*g)/g,(0|e*g)/g,(0|n*g)/g,(0|l*g)/g,(0|f*g)/g,(0|i*g)/g,(0|a*g)/g,(0|_*g)/g,(0|m*g)/g,s,o,u,O?1+-u/O:1].join(",")+")"},ke=function(t){var e,i,s,r,n,a=this.data,o=this.t,h=o.style;return a.rotationX||a.rotationY||a.z||a.force3D?(this.setRatio=Se,Se.call(this,t),void 0):(a.rotation||a.skewX?(e=a.rotation*M,i=e-a.skewX*M,s=1e5,r=a.scaleX*s,n=a.scaleY*s,h[ye]="matrix("+(0|Math.cos(e)*r)/s+","+(0|Math.sin(e)*r)/s+","+(0|Math.sin(i)*-n)/s+","+(0|Math.cos(i)*n)/s+","+a.x+","+a.y+")"):h[ye]="matrix("+a.scaleX+",0,0,"+a.scaleY+","+a.x+","+a.y+")",void 0)};de("transform,scale,scaleX,scaleY,scaleZ,x,y,z,rotation,rotationX,rotationY,rotationZ,skewX,skewY,shortRotation,shortRotationX,shortRotationY,shortRotationZ,transformOrigin,transformPerspective,directionalRotation,parseTransform,force3D",{parser:function(t,e,i,s,n,a,o){if(s._transform)return n;var h,l,_,u,p,c,f,m=s._transform=be(t,r,!0,o.parseTransform),d=t.style,g=1e-6,v=ve.length,y=o,T={};if("string"==typeof y.transform&&ye)_=d.cssText,d[ye]=y.transform,d.display="block",h=be(t,null,!1),d.cssText=_;else if("object"==typeof y){if(h={scaleX:se(null!=y.scaleX?y.scaleX:y.scale,m.scaleX),scaleY:se(null!=y.scaleY?y.scaleY:y.scale,m.scaleY),scaleZ:se(y.scaleZ,m.scaleZ),x:se(y.x,m.x),y:se(y.y,m.y),z:se(y.z,m.z),perspective:se(y.transformPerspective,m.perspective)},f=y.directionalRotation,null!=f)if("object"==typeof f)for(_ in f)y[_]=f[_];else y.rotation=f;h.rotation=re("rotation"in y?y.rotation:"shortRotation"in y?y.shortRotation+"_short":"rotationZ"in y?y.rotationZ:m.rotation,m.rotation,"rotation",T),xe&&(h.rotationX=re("rotationX"in y?y.rotationX:"shortRotationX"in y?y.shortRotationX+"_short":m.rotationX||0,m.rotationX,"rotationX",T),h.rotationY=re("rotationY"in y?y.rotationY:"shortRotationY"in y?y.shortRotationY+"_short":m.rotationY||0,m.rotationY,"rotationY",T)),h.skewX=null==y.skewX?m.skewX:re(y.skewX,m.skewX),h.skewY=null==y.skewY?m.skewY:re(y.skewY,m.skewY),(l=h.skewY-m.skewY)&&(h.skewX+=l,h.rotation+=l)}for(xe&&null!=y.force3D&&(m.force3D=y.force3D,c=!0),p=m.force3D||m.z||m.rotationX||m.rotationY||h.z||h.rotationX||h.rotationY||h.perspective,p||null==y.scale||(h.scaleZ=1);--v>-1;)i=ve[v],u=h[i]-m[i],(u>g||-g>u||null!=E[i])&&(c=!0,n=new pe(m,i,m[i],u,n),i in T&&(n.e=T[i]),n.xs0=0,n.plugin=a,s._overwriteProps.push(n.n));return u=y.transformOrigin,(u||xe&&p&&m.zOrigin)&&(ye?(c=!0,i=we,u=(u||G(t,i,r,!1,"50% 50%"))+"",n=new pe(d,i,0,0,n,-1,"transformOrigin"),n.b=d[i],n.plugin=a,xe?(_=m.zOrigin,u=u.split(" "),m.zOrigin=(u.length>2&&(0===_||"0px"!==u[2])?parseFloat(u[2]):_)||0,n.xs0=n.e=d[i]=u[0]+" "+(u[1]||"50%")+" 0px",n=new pe(m,"zOrigin",0,0,n,-1,n.n),n.b=_,n.xs0=n.e=m.zOrigin):n.xs0=n.e=d[i]=u):ee(u+"",m)),c&&(s._transformType=p||3===this._transformType?3:2),n},prefix:!0}),de("boxShadow",{defaultValue:"0px 0px 0px 0px #999",prefix:!0,color:!0,multi:!0,keyword:"inset"}),de("borderRadius",{defaultValue:"0px",parser:function(t,e,i,n,a){e=this.format(e);var o,h,l,_,u,p,c,f,m,d,g,v,y,T,w,x,b=["borderTopLeftRadius","borderTopRightRadius","borderBottomRightRadius","borderBottomLeftRadius"],P=t.style;for(m=parseFloat(t.offsetWidth),d=parseFloat(t.offsetHeight),o=e.split(" "),h=0;b.length>h;h++)this.p.indexOf("border")&&(b[h]=V(b[h])),u=_=G(t,b[h],r,!1,"0px"),-1!==u.indexOf(" ")&&(_=u.split(" "),u=_[0],_=_[1]),p=l=o[h],c=parseFloat(u),v=u.substr((c+"").length),y="="===p.charAt(1),y?(f=parseInt(p.charAt(0)+"1",10),p=p.substr(2),f*=parseFloat(p),g=p.substr((f+"").length-(0>f?1:0))||""):(f=parseFloat(p),g=p.substr((f+"").length)),""===g&&(g=s[i]||v),g!==v&&(T=$(t,"borderLeft",c,v),w=$(t,"borderTop",c,v),"%"===g?(u=100*(T/m)+"%",_=100*(w/d)+"%"):"em"===g?(x=$(t,"borderLeft",1,"em"),u=T/x+"em",_=w/x+"em"):(u=T+"px",_=w+"px"),y&&(p=parseFloat(u)+f+g,l=parseFloat(_)+f+g)),a=ce(P,b[h],u+" "+_,p+" "+l,!1,"0px",a);return a},prefix:!0,formatter:le("0px 0px 0px 0px",!1,!0)}),de("backgroundPosition",{defaultValue:"0 0",parser:function(t,e,i,s,n,a){var o,h,l,_,u,p,c="background-position",m=r||W(t,null),d=this.format((m?f?m.getPropertyValue(c+"-x")+" "+m.getPropertyValue(c+"-y"):m.getPropertyValue(c):t.currentStyle.backgroundPositionX+" "+t.currentStyle.backgroundPositionY)||"0 0"),g=this.format(e);if(-1!==d.indexOf("%")!=(-1!==g.indexOf("%"))&&(p=G(t,"backgroundImage").replace(k,""),p&&"none"!==p)){for(o=d.split(" "),h=g.split(" "),L.setAttribute("src",p),l=2;--l>-1;)d=o[l],_=-1!==d.indexOf("%"),_!==(-1!==h[l].indexOf("%"))&&(u=0===l?t.offsetWidth-L.width:t.offsetHeight-L.height,o[l]=_?parseFloat(d)/100*u+"px":100*(parseFloat(d)/u)+"%");d=o.join(" ")}return this.parseComplex(t.style,d,g,n,a)},formatter:ee}),de("backgroundSize",{defaultValue:"0 0",formatter:ee}),de("perspective",{defaultValue:"0px",prefix:!0}),de("perspectiveOrigin",{defaultValue:"50% 50%",prefix:!0}),de("transformStyle",{prefix:!0}),de("backfaceVisibility",{prefix:!0}),de("userSelect",{prefix:!0}),de("margin",{parser:_e("marginTop,marginRight,marginBottom,marginLeft")}),de("padding",{parser:_e("paddingTop,paddingRight,paddingBottom,paddingLeft")}),de("clip",{defaultValue:"rect(0px,0px,0px,0px)",parser:function(t,e,i,s,n,a){var o,h,l;return 9>f?(h=t.currentStyle,l=8>f?" ":",",o="rect("+h.clipTop+l+h.clipRight+l+h.clipBottom+l+h.clipLeft+")",e=this.format(e).split(",").join(l)):(o=this.format(G(t,this.p,r,!1,this.dflt)),e=this.format(e)),this.parseComplex(t.style,o,e,n,a)}}),de("textShadow",{defaultValue:"0px 0px 0px #999",color:!0,multi:!0}),de("autoRound,strictUnits",{parser:function(t,e,i,s,r){return r}}),de("border",{defaultValue:"0px solid #000",parser:function(t,e,i,s,n,a){return this.parseComplex(t.style,this.format(G(t,"borderTopWidth",r,!1,"0px")+" "+G(t,"borderTopStyle",r,!1,"solid")+" "+G(t,"borderTopColor",r,!1,"#000")),this.format(e),n,a)},color:!0,formatter:function(t){var e=t.split(" ");return e[0]+" "+(e[1]||"solid")+" "+(t.match(he)||["#000"])[0]}}),de("borderWidth",{parser:_e("borderTopWidth,borderRightWidth,borderBottomWidth,borderLeftWidth")}),de("float,cssFloat,styleFloat",{parser:function(t,e,i,s,r){var n=t.style,a="cssFloat"in n?"cssFloat":"styleFloat";return new pe(n,a,0,0,r,-1,i,!1,0,n[a],e)}});var Re=function(t){var e,i=this.t,s=i.filter||G(this.data,"filter"),r=0|this.s+this.c*t;100===r&&(-1===s.indexOf("atrix(")&&-1===s.indexOf("radient(")&&-1===s.indexOf("oader(")?(i.removeAttribute("filter"),e=!G(this.data,"filter")):(i.filter=s.replace(x,""),e=!0)),e||(this.xn1&&(i.filter=s=s||"alpha(opacity="+r+")"),-1===s.indexOf("opacity")?0===r&&this.xn1||(i.filter=s+" alpha(opacity="+r+")"):i.filter=s.replace(T,"opacity="+r))};de("opacity,alpha,autoAlpha",{defaultValue:"1",parser:function(t,e,i,s,n,a){var o=parseFloat(G(t,"opacity",r,!1,"1")),h=t.style,l="autoAlpha"===i;return"string"==typeof e&&"="===e.charAt(1)&&(e=("-"===e.charAt(0)?-1:1)*parseFloat(e.substr(2))+o),l&&1===o&&"hidden"===G(t,"visibility",r)&&0!==e&&(o=0),U?n=new pe(h,"opacity",o,e-o,n):(n=new pe(h,"opacity",100*o,100*(e-o),n),n.xn1=l?1:0,h.zoom=1,n.type=2,n.b="alpha(opacity="+n.s+")",n.e="alpha(opacity="+(n.s+n.c)+")",n.data=t,n.plugin=a,n.setRatio=Re),l&&(n=new pe(h,"visibility",0,0,n,-1,null,!1,0,0!==o?"inherit":"hidden",0===e?"hidden":"inherit"),n.xs0="inherit",s._overwriteProps.push(n.n),s._overwriteProps.push(i)),n}});var Ae=function(t,e){e&&(t.removeProperty?t.removeProperty(e.replace(P,"-$1").toLowerCase()):t.removeAttribute(e))},Ce=function(t){if(this.t._gsClassPT=this,1===t||0===t){this.t.className=0===t?this.b:this.e;for(var e=this.data,i=this.t.style;e;)e.v?i[e.p]=e.v:Ae(i,e.p),e=e._next;1===t&&this.t._gsClassPT===this&&(this.t._gsClassPT=null)}else this.t.className!==this.e&&(this.t.className=this.e)};de("className",{parser:function(t,e,s,n,a,o,h){var l,_,u,p,c,f=t.className,m=t.style.cssText;if(a=n._classNamePT=new pe(t,s,0,0,a,2),a.setRatio=Ce,a.pr=-11,i=!0,a.b=f,_=Q(t,r),u=t._gsClassPT){for(p={},c=u.data;c;)p[c.p]=1,c=c._next;u.setRatio(1)}return t._gsClassPT=a,a.e="="!==e.charAt(1)?e:f.replace(RegExp("\\s*\\b"+e.substr(2)+"\\b"),"")+("+"===e.charAt(0)?" "+e.substr(2):""),n._tween._duration&&(t.className=a.e,l=H(t,_,Q(t),h,p),t.className=f,a.data=l.firstMPT,t.style.cssText=m,a=a.xfirst=n.parse(t,l.difs,a,o)),a}});var Oe=function(t){if((1===t||0===t)&&this.data._totalTime===this.data._totalDuration&&"isFromStart"!==this.data.data){var e,i,s,r,n=this.t.style,a=o.transform.parse;if("all"===this.e)n.cssText="",r=!0;else for(e=this.e.split(","),s=e.length;--s>-1;)i=e[s],o[i]&&(o[i].parse===a?r=!0:i="transformOrigin"===i?we:o[i].p),Ae(n,i);r&&(Ae(n,ye),this.t._gsTransform&&delete this.t._gsTransform)}};for(de("clearProps",{parser:function(t,e,s,r,n){return n=new pe(t,s,0,0,n,2),n.setRatio=Oe,n.e=e,n.pr=-10,n.data=r._tween,i=!0,n}}),h="bezier,throwProps,physicsProps,physics2D".split(","),fe=h.length;fe--;)ge(h[fe]);h=a.prototype,h._firstPT=null,h._onInitTween=function(t,e,o){if(!t.nodeType)return!1;this._target=t,this._tween=o,this._vars=e,l=e.autoRound,i=!1,s=e.suffixMap||a.suffixMap,r=W(t,""),n=this._overwriteProps;var h,p,f,m,d,g,v,y,T,x=t.style;if(_&&""===x.zIndex&&(h=G(t,"zIndex",r),("auto"===h||""===h)&&(x.zIndex=0)),"string"==typeof e&&(m=x.cssText,h=Q(t,r),x.cssText=m+";"+e,h=H(t,h,Q(t)).difs,!U&&w.test(e)&&(h.opacity=parseFloat(RegExp.$1)),e=h,x.cssText=m),this._firstPT=p=this.parse(t,e,null),this._transformType){for(T=3===this._transformType,ye?u&&(_=!0,""===x.zIndex&&(v=G(t,"zIndex",r),("auto"===v||""===v)&&(x.zIndex=0)),c&&(x.WebkitBackfaceVisibility=this._vars.WebkitBackfaceVisibility||(T?"visible":"hidden"))):x.zoom=1,f=p;f&&f._next;)f=f._next;y=new pe(t,"transform",0,0,null,2),this._linkCSSP(y,null,f),y.setRatio=T&&xe?Se:ye?ke:Pe,y.data=this._transform||be(t,r,!0),n.pop()}if(i){for(;p;){for(g=p._next,f=m;f&&f.pr>p.pr;)f=f._next;(p._prev=f?f._prev:d)?p._prev._next=p:m=p,(p._next=f)?f._prev=p:d=p,p=g}this._firstPT=m}return!0},h.parse=function(t,e,i,n){var a,h,_,u,p,c,f,m,d,g,v=t.style;for(a in e)c=e[a],h=o[a],h?i=h.parse(t,c,a,this,i,n,e):(p=G(t,a,r)+"",d="string"==typeof c,"color"===a||"fill"===a||"stroke"===a||-1!==a.indexOf("Color")||d&&b.test(c)?(d||(c=oe(c),c=(c.length>3?"rgba(":"rgb(")+c.join(",")+")"),i=ce(v,a,p,c,!0,"transparent",i,0,n)):!d||-1===c.indexOf(" ")&&-1===c.indexOf(",")?(_=parseFloat(p),f=_||0===_?p.substr((_+"").length):"",(""===p||"auto"===p)&&("width"===a||"height"===a?(_=te(t,a,r),f="px"):"left"===a||"top"===a?(_=Z(t,a,r),f="px"):(_="opacity"!==a?0:1,f="")),g=d&&"="===c.charAt(1),g?(u=parseInt(c.charAt(0)+"1",10),c=c.substr(2),u*=parseFloat(c),m=c.replace(y,"")):(u=parseFloat(c),m=d?c.substr((u+"").length)||"":""),""===m&&(m=a in s?s[a]:f),c=u||0===u?(g?u+_:u)+m:e[a],f!==m&&""!==m&&(u||0===u)&&(_||0===_)&&(_=$(t,a,_,f),"%"===m?(_/=$(t,a,100,"%")/100,e.strictUnits!==!0&&(p=_+"%")):"em"===m?_/=$(t,a,1,"em"):(u=$(t,a,u,m),m="px"),g&&(u||0===u)&&(c=u+_+m)),g&&(u+=_),!_&&0!==_||!u&&0!==u?void 0!==v[a]&&(c||"NaN"!=c+""&&null!=c)?(i=new pe(v,a,u||_||0,0,i,-1,a,!1,0,p,c),i.xs0="none"!==c||"display"!==a&&-1===a.indexOf("Style")?c:p):j("invalid "+a+" tween value: "+e[a]):(i=new pe(v,a,_,u-_,i,0,a,l!==!1&&("px"===m||"zIndex"===a),0,p,c),i.xs0=m)):i=ce(v,a,p,c,!0,null,i,0,n)),n&&i&&!i.plugin&&(i.plugin=n);return i},h.setRatio=function(t){var e,i,s,r=this._firstPT,n=1e-6;if(1!==t||this._tween._time!==this._tween._duration&&0!==this._tween._time)if(t||this._tween._time!==this._tween._duration&&0!==this._tween._time||this._tween._rawPrevTime===-1e-6)for(;r;){if(e=r.c*t+r.s,r.r?e=e>0?0|e+.5:0|e-.5:n>e&&e>-n&&(e=0),r.type)if(1===r.type)if(s=r.l,2===s)r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2;else if(3===s)r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2+r.xn2+r.xs3;else if(4===s)r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2+r.xn2+r.xs3+r.xn3+r.xs4;else if(5===s)r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2+r.xn2+r.xs3+r.xn3+r.xs4+r.xn4+r.xs5;else{for(i=r.xs0+e+r.xs1,s=1;r.l>s;s++)i+=r["xn"+s]+r["xs"+(s+1)];r.t[r.p]=i}else-1===r.type?r.t[r.p]=r.xs0:r.setRatio&&r.setRatio(t);else r.t[r.p]=e+r.xs0;r=r._next}else for(;r;)2!==r.type?r.t[r.p]=r.b:r.setRatio(t),r=r._next;else for(;r;)2!==r.type?r.t[r.p]=r.e:r.setRatio(t),r=r._next},h._enableTransforms=function(t){this._transformType=t||3===this._transformType?3:2,this._transform=this._transform||be(this._target,r,!0)},h._linkCSSP=function(t,e,i,s){return t&&(e&&(e._prev=t),t._next&&(t._next._prev=t._prev),t._prev?t._prev._next=t._next:this._firstPT===t&&(this._firstPT=t._next,s=!0),i?i._next=t:s||null!==this._firstPT||(this._firstPT=t),t._next=e,t._prev=i),t},h._kill=function(e){var i,s,r,n=e;if(e.autoAlpha||e.alpha){n={};for(s in e)n[s]=e[s];n.opacity=1,n.autoAlpha&&(n.visibility=1)}return e.className&&(i=this._classNamePT)&&(r=i.xfirst,r&&r._prev?this._linkCSSP(r._prev,i._next,r._prev._prev):r===this._firstPT&&(this._firstPT=i._next),i._next&&this._linkCSSP(i._next,i._next._next,r._prev),this._classNamePT=null),t.prototype._kill.call(this,n)};var De=function(t,e,i){var s,r,n,a;if(t.slice)for(r=t.length;--r>-1;)De(t[r],e,i);else for(s=t.childNodes,r=s.length;--r>-1;)n=s[r],a=n.type,n.style&&(e.push(Q(n)),i&&i.push(n)),1!==a&&9!==a&&11!==a||!n.childNodes.length||De(n,e,i)};return a.cascadeTo=function(t,i,s){var r,n,a,o=e.to(t,i,s),h=[o],l=[],_=[],u=[],p=e._internals.reservedProps;for(t=o._targets||o.target,De(t,l,u),o.render(i,!0),De(t,_),o.render(0,!0),o._enabled(!0),r=u.length;--r>-1;)if(n=H(u[r],l[r],_[r]),n.firstMPT){n=n.difs;for(a in s)p[a]&&(n[a]=s[a]);h.push(e.to(u[r],i,n))}return h},t.activate([a]),a},!0),function(){var t=window._gsDefine.plugin({propName:"roundProps",priority:-1,API:2,init:function(t,e,i){return this._tween=i,!0}}),e=t.prototype;e._onInitAllProps=function(){for(var t,e,i,s=this._tween,r=s.vars.roundProps instanceof Array?s.vars.roundProps:s.vars.roundProps.split(","),n=r.length,a={},o=s._propLookup.roundProps;--n>-1;)a[r[n]]=1;for(n=r.length;--n>-1;)for(t=r[n],e=s._firstPT;e;)i=e._next,e.pg?e.t._roundProps(a,!0):e.n===t&&(this._add(e.t,t,e.s,e.c),i&&(i._prev=e._prev),e._prev?e._prev._next=i:s._firstPT===e&&(s._firstPT=i),e._next=e._prev=null,s._propLookup[t]=o),e=i;return!1},e._add=function(t,e,i,s){this._addTween(t,e,i,i+s,e,!0),this._overwriteProps.push(e)
}}(),window._gsDefine.plugin({propName:"attr",API:2,version:"0.2.0",init:function(t,e){var i;if("function"!=typeof t.setAttribute)return!1;this._target=t,this._proxy={};for(i in e)this._addTween(this._proxy,i,parseFloat(t.getAttribute(i)),e[i],i)&&this._overwriteProps.push(i);return!0},set:function(t){this._super.setRatio.call(this,t);for(var e,i=this._overwriteProps,s=i.length;--s>-1;)e=i[s],this._target.setAttribute(e,this._proxy[e]+"")}}),window._gsDefine.plugin({propName:"directionalRotation",API:2,version:"0.2.0",init:function(t,e){"object"!=typeof e&&(e={rotation:e}),this.finals={};var i,s,r,n,a,o,h=e.useRadians===!0?2*Math.PI:360,l=1e-6;for(i in e)"useRadians"!==i&&(o=(e[i]+"").split("_"),s=o[0],r=parseFloat("function"!=typeof t[i]?t[i]:t[i.indexOf("set")||"function"!=typeof t["get"+i.substr(3)]?i:"get"+i.substr(3)]()),n=this.finals[i]="string"==typeof s&&"="===s.charAt(1)?r+parseInt(s.charAt(0)+"1",10)*Number(s.substr(2)):Number(s)||0,a=n-r,o.length&&(s=o.join("_"),-1!==s.indexOf("short")&&(a%=h,a!==a%(h/2)&&(a=0>a?a+h:a-h)),-1!==s.indexOf("_cw")&&0>a?a=(a+9999999999*h)%h-(0|a/h)*h:-1!==s.indexOf("ccw")&&a>0&&(a=(a-9999999999*h)%h-(0|a/h)*h)),(a>l||-l>a)&&(this._addTween(t,i,r,r+a,i),this._overwriteProps.push(i)));return!0},set:function(t){var e;if(1!==t)this._super.setRatio.call(this,t);else for(e=this._firstPT;e;)e.f?e.t[e.p](this.finals[e.p]):e.t[e.p]=this.finals[e.p],e=e._next}})._autoCSS=!0,window._gsDefine("easing.Back",["easing.Ease"],function(t){var e,i,s,r=window.GreenSockGlobals||window,n=r.com.greensock,a=2*Math.PI,o=Math.PI/2,h=n._class,l=function(e,i){var s=h("easing."+e,function(){},!0),r=s.prototype=new t;return r.constructor=s,r.getRatio=i,s},_=t.register||function(){},u=function(t,e,i,s){var r=h("easing."+t,{easeOut:new e,easeIn:new i,easeInOut:new s},!0);return _(r,t),r},p=function(t,e,i){this.t=t,this.v=e,i&&(this.next=i,i.prev=this,this.c=i.v-e,this.gap=i.t-t)},c=function(e,i){var s=h("easing."+e,function(t){this._p1=t||0===t?t:1.70158,this._p2=1.525*this._p1},!0),r=s.prototype=new t;return r.constructor=s,r.getRatio=i,r.config=function(t){return new s(t)},s},f=u("Back",c("BackOut",function(t){return(t-=1)*t*((this._p1+1)*t+this._p1)+1}),c("BackIn",function(t){return t*t*((this._p1+1)*t-this._p1)}),c("BackInOut",function(t){return 1>(t*=2)?.5*t*t*((this._p2+1)*t-this._p2):.5*((t-=2)*t*((this._p2+1)*t+this._p2)+2)})),m=h("easing.SlowMo",function(t,e,i){e=e||0===e?e:.7,null==t?t=.7:t>1&&(t=1),this._p=1!==t?e:0,this._p1=(1-t)/2,this._p2=t,this._p3=this._p1+this._p2,this._calcEnd=i===!0},!0),d=m.prototype=new t;return d.constructor=m,d.getRatio=function(t){var e=t+(.5-t)*this._p;return this._p1>t?this._calcEnd?1-(t=1-t/this._p1)*t:e-(t=1-t/this._p1)*t*t*t*e:t>this._p3?this._calcEnd?1-(t=(t-this._p3)/this._p1)*t:e+(t-e)*(t=(t-this._p3)/this._p1)*t*t*t:this._calcEnd?1:e},m.ease=new m(.7,.7),d.config=m.config=function(t,e,i){return new m(t,e,i)},e=h("easing.SteppedEase",function(t){t=t||1,this._p1=1/t,this._p2=t+1},!0),d=e.prototype=new t,d.constructor=e,d.getRatio=function(t){return 0>t?t=0:t>=1&&(t=.999999999),(this._p2*t>>0)*this._p1},d.config=e.config=function(t){return new e(t)},i=h("easing.RoughEase",function(e){e=e||{};for(var i,s,r,n,a,o,h=e.taper||"none",l=[],_=0,u=0|(e.points||20),c=u,f=e.randomize!==!1,m=e.clamp===!0,d=e.template instanceof t?e.template:null,g="number"==typeof e.strength?.4*e.strength:.4;--c>-1;)i=f?Math.random():1/u*c,s=d?d.getRatio(i):i,"none"===h?r=g:"out"===h?(n=1-i,r=n*n*g):"in"===h?r=i*i*g:.5>i?(n=2*i,r=.5*n*n*g):(n=2*(1-i),r=.5*n*n*g),f?s+=Math.random()*r-.5*r:c%2?s+=.5*r:s-=.5*r,m&&(s>1?s=1:0>s&&(s=0)),l[_++]={x:i,y:s};for(l.sort(function(t,e){return t.x-e.x}),o=new p(1,1,null),c=u;--c>-1;)a=l[c],o=new p(a.x,a.y,o);this._prev=new p(0,0,0!==o.t?o:o.next)},!0),d=i.prototype=new t,d.constructor=i,d.getRatio=function(t){var e=this._prev;if(t>e.t){for(;e.next&&t>=e.t;)e=e.next;e=e.prev}else for(;e.prev&&e.t>=t;)e=e.prev;return this._prev=e,e.v+(t-e.t)/e.gap*e.c},d.config=function(t){return new i(t)},i.ease=new i,u("Bounce",l("BounceOut",function(t){return 1/2.75>t?7.5625*t*t:2/2.75>t?7.5625*(t-=1.5/2.75)*t+.75:2.5/2.75>t?7.5625*(t-=2.25/2.75)*t+.9375:7.5625*(t-=2.625/2.75)*t+.984375}),l("BounceIn",function(t){return 1/2.75>(t=1-t)?1-7.5625*t*t:2/2.75>t?1-(7.5625*(t-=1.5/2.75)*t+.75):2.5/2.75>t?1-(7.5625*(t-=2.25/2.75)*t+.9375):1-(7.5625*(t-=2.625/2.75)*t+.984375)}),l("BounceInOut",function(t){var e=.5>t;return t=e?1-2*t:2*t-1,t=1/2.75>t?7.5625*t*t:2/2.75>t?7.5625*(t-=1.5/2.75)*t+.75:2.5/2.75>t?7.5625*(t-=2.25/2.75)*t+.9375:7.5625*(t-=2.625/2.75)*t+.984375,e?.5*(1-t):.5*t+.5})),u("Circ",l("CircOut",function(t){return Math.sqrt(1-(t-=1)*t)}),l("CircIn",function(t){return-(Math.sqrt(1-t*t)-1)}),l("CircInOut",function(t){return 1>(t*=2)?-.5*(Math.sqrt(1-t*t)-1):.5*(Math.sqrt(1-(t-=2)*t)+1)})),s=function(e,i,s){var r=h("easing."+e,function(t,e){this._p1=t||1,this._p2=e||s,this._p3=this._p2/a*(Math.asin(1/this._p1)||0)},!0),n=r.prototype=new t;return n.constructor=r,n.getRatio=i,n.config=function(t,e){return new r(t,e)},r},u("Elastic",s("ElasticOut",function(t){return this._p1*Math.pow(2,-10*t)*Math.sin((t-this._p3)*a/this._p2)+1},.3),s("ElasticIn",function(t){return-(this._p1*Math.pow(2,10*(t-=1))*Math.sin((t-this._p3)*a/this._p2))},.3),s("ElasticInOut",function(t){return 1>(t*=2)?-.5*this._p1*Math.pow(2,10*(t-=1))*Math.sin((t-this._p3)*a/this._p2):.5*this._p1*Math.pow(2,-10*(t-=1))*Math.sin((t-this._p3)*a/this._p2)+1},.45)),u("Expo",l("ExpoOut",function(t){return 1-Math.pow(2,-10*t)}),l("ExpoIn",function(t){return Math.pow(2,10*(t-1))-.001}),l("ExpoInOut",function(t){return 1>(t*=2)?.5*Math.pow(2,10*(t-1)):.5*(2-Math.pow(2,-10*(t-1)))})),u("Sine",l("SineOut",function(t){return Math.sin(t*o)}),l("SineIn",function(t){return-Math.cos(t*o)+1}),l("SineInOut",function(t){return-.5*(Math.cos(Math.PI*t)-1)})),h("easing.EaseLookup",{find:function(e){return t.map[e]}},!0),_(r.SlowMo,"SlowMo","ease,"),_(i,"RoughEase","ease,"),_(e,"SteppedEase","ease,"),f},!0)}),function(t){"use strict";var e=t.GreenSockGlobals||t;if(!e.TweenLite){var i,s,r,n,a,o=function(t){var i,s=t.split("."),r=e;for(i=0;s.length>i;i++)r[s[i]]=r=r[s[i]]||{};return r},h=o("com.greensock"),l=1e-10,_=[].slice,u=function(){},p=function(){var t=Object.prototype.toString,e=t.call([]);return function(i){return null!=i&&(i instanceof Array||"object"==typeof i&&!!i.push&&t.call(i)===e)}}(),c={},f=function(i,s,r,n){this.sc=c[i]?c[i].sc:[],c[i]=this,this.gsClass=null,this.func=r;var a=[];this.check=function(h){for(var l,_,u,p,m=s.length,d=m;--m>-1;)(l=c[s[m]]||new f(s[m],[])).gsClass?(a[m]=l.gsClass,d--):h&&l.sc.push(this);if(0===d&&r)for(_=("com.greensock."+i).split("."),u=_.pop(),p=o(_.join("."))[u]=this.gsClass=r.apply(r,a),n&&(e[u]=p,"function"==typeof define&&define.amd?define((t.GreenSockAMDPath?t.GreenSockAMDPath+"/":"")+i.split(".").join("/"),[],function(){return p}):"undefined"!=typeof module&&module.exports&&(module.exports=p)),m=0;this.sc.length>m;m++)this.sc[m].check()},this.check(!0)},m=t._gsDefine=function(t,e,i,s){return new f(t,e,i,s)},d=h._class=function(t,e,i){return e=e||function(){},m(t,[],function(){return e},i),e};m.globals=e;var g=[0,0,1,1],v=[],y=d("easing.Ease",function(t,e,i,s){this._func=t,this._type=i||0,this._power=s||0,this._params=e?g.concat(e):g},!0),T=y.map={},w=y.register=function(t,e,i,s){for(var r,n,a,o,l=e.split(","),_=l.length,u=(i||"easeIn,easeOut,easeInOut").split(",");--_>-1;)for(n=l[_],r=s?d("easing."+n,null,!0):h.easing[n]||{},a=u.length;--a>-1;)o=u[a],T[n+"."+o]=T[o+n]=r[o]=t.getRatio?t:t[o]||new t};for(r=y.prototype,r._calcEnd=!1,r.getRatio=function(t){if(this._func)return this._params[0]=t,this._func.apply(null,this._params);var e=this._type,i=this._power,s=1===e?1-t:2===e?t:.5>t?2*t:2*(1-t);return 1===i?s*=s:2===i?s*=s*s:3===i?s*=s*s*s:4===i&&(s*=s*s*s*s),1===e?1-s:2===e?s:.5>t?s/2:1-s/2},i=["Linear","Quad","Cubic","Quart","Quint,Strong"],s=i.length;--s>-1;)r=i[s]+",Power"+s,w(new y(null,null,1,s),r,"easeOut",!0),w(new y(null,null,2,s),r,"easeIn"+(0===s?",easeNone":"")),w(new y(null,null,3,s),r,"easeInOut");T.linear=h.easing.Linear.easeIn,T.swing=h.easing.Quad.easeInOut;var x=d("events.EventDispatcher",function(t){this._listeners={},this._eventTarget=t||this});r=x.prototype,r.addEventListener=function(t,e,i,s,r){r=r||0;var o,h,l=this._listeners[t],_=0;for(null==l&&(this._listeners[t]=l=[]),h=l.length;--h>-1;)o=l[h],o.c===e&&o.s===i?l.splice(h,1):0===_&&r>o.pr&&(_=h+1);l.splice(_,0,{c:e,s:i,up:s,pr:r}),this!==n||a||n.wake()},r.removeEventListener=function(t,e){var i,s=this._listeners[t];if(s)for(i=s.length;--i>-1;)if(s[i].c===e)return s.splice(i,1),void 0},r.dispatchEvent=function(t){var e,i,s,r=this._listeners[t];if(r)for(e=r.length,i=this._eventTarget;--e>-1;)s=r[e],s.up?s.c.call(s.s||i,{type:t,target:i}):s.c.call(s.s||i)};var b=t.requestAnimationFrame,P=t.cancelAnimationFrame,S=Date.now||function(){return(new Date).getTime()},k=S();for(i=["ms","moz","webkit","o"],s=i.length;--s>-1&&!b;)b=t[i[s]+"RequestAnimationFrame"],P=t[i[s]+"CancelAnimationFrame"]||t[i[s]+"CancelRequestAnimationFrame"];d("Ticker",function(t,e){var i,s,r,o,h,l=this,_=S(),p=e!==!1&&b,c=function(t){k=S(),l.time=(k-_)/1e3;var e,n=l.time-h;(!i||n>0||t===!0)&&(l.frame++,h+=n+(n>=o?.004:o-n),e=!0),t!==!0&&(r=s(c)),e&&l.dispatchEvent("tick")};x.call(l),l.time=l.frame=0,l.tick=function(){c(!0)},l.sleep=function(){null!=r&&(p&&P?P(r):clearTimeout(r),s=u,r=null,l===n&&(a=!1))},l.wake=function(){null!==r&&l.sleep(),s=0===i?u:p&&b?b:function(t){return setTimeout(t,0|1e3*(h-l.time)+1)},l===n&&(a=!0),c(2)},l.fps=function(t){return arguments.length?(i=t,o=1/(i||60),h=this.time+o,l.wake(),void 0):i},l.useRAF=function(t){return arguments.length?(l.sleep(),p=t,l.fps(i),void 0):p},l.fps(t),setTimeout(function(){p&&(!r||5>l.frame)&&l.useRAF(!1)},1500)}),r=h.Ticker.prototype=new h.events.EventDispatcher,r.constructor=h.Ticker;var R=d("core.Animation",function(t,e){if(this.vars=e=e||{},this._duration=this._totalDuration=t||0,this._delay=Number(e.delay)||0,this._timeScale=1,this._active=e.immediateRender===!0,this.data=e.data,this._reversed=e.reversed===!0,U){a||n.wake();var i=this.vars.useFrames?z:U;i.add(this,i._time),this.vars.paused&&this.paused(!0)}});n=R.ticker=new h.Ticker,r=R.prototype,r._dirty=r._gc=r._initted=r._paused=!1,r._totalTime=r._time=0,r._rawPrevTime=-1,r._next=r._last=r._onUpdate=r._timeline=r.timeline=null,r._paused=!1;var A=function(){a&&S()-k>2e3&&n.wake(),setTimeout(A,2e3)};A(),r.play=function(t,e){return arguments.length&&this.seek(t,e),this.reversed(!1).paused(!1)},r.pause=function(t,e){return arguments.length&&this.seek(t,e),this.paused(!0)},r.resume=function(t,e){return arguments.length&&this.seek(t,e),this.paused(!1)},r.seek=function(t,e){return this.totalTime(Number(t),e!==!1)},r.restart=function(t,e){return this.reversed(!1).paused(!1).totalTime(t?-this._delay:0,e!==!1,!0)},r.reverse=function(t,e){return arguments.length&&this.seek(t||this.totalDuration(),e),this.reversed(!0).paused(!1)},r.render=function(){},r.invalidate=function(){return this},r.isActive=function(){var t,e=this._timeline,i=this._startTime;return!e||!this._gc&&!this._paused&&e.isActive()&&(t=e.rawTime())>=i&&i+this.totalDuration()/this._timeScale>t},r._enabled=function(t,e){return a||n.wake(),this._gc=!t,this._active=this.isActive(),e!==!0&&(t&&!this.timeline?this._timeline.add(this,this._startTime-this._delay):!t&&this.timeline&&this._timeline._remove(this,!0)),!1},r._kill=function(){return this._enabled(!1,!1)},r.kill=function(t,e){return this._kill(t,e),this},r._uncache=function(t){for(var e=t?this:this.timeline;e;)e._dirty=!0,e=e.timeline;return this},r._swapSelfInParams=function(t){for(var e=t.length,i=t.concat();--e>-1;)"{self}"===t[e]&&(i[e]=this);return i},r.eventCallback=function(t,e,i,s){if("on"===(t||"").substr(0,2)){var r=this.vars;if(1===arguments.length)return r[t];null==e?delete r[t]:(r[t]=e,r[t+"Params"]=p(i)&&-1!==i.join("").indexOf("{self}")?this._swapSelfInParams(i):i,r[t+"Scope"]=s),"onUpdate"===t&&(this._onUpdate=e)}return this},r.delay=function(t){return arguments.length?(this._timeline.smoothChildTiming&&this.startTime(this._startTime+t-this._delay),this._delay=t,this):this._delay},r.duration=function(t){return arguments.length?(this._duration=this._totalDuration=t,this._uncache(!0),this._timeline.smoothChildTiming&&this._time>0&&this._time<this._duration&&0!==t&&this.totalTime(this._totalTime*(t/this._duration),!0),this):(this._dirty=!1,this._duration)},r.totalDuration=function(t){return this._dirty=!1,arguments.length?this.duration(t):this._totalDuration},r.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),this.totalTime(t>this._duration?this._duration:t,e)):this._time},r.totalTime=function(t,e,i){if(a||n.wake(),!arguments.length)return this._totalTime;if(this._timeline){if(0>t&&!i&&(t+=this.totalDuration()),this._timeline.smoothChildTiming){this._dirty&&this.totalDuration();var s=this._totalDuration,r=this._timeline;if(t>s&&!i&&(t=s),this._startTime=(this._paused?this._pauseTime:r._time)-(this._reversed?s-t:t)/this._timeScale,r._dirty||this._uncache(!1),r._timeline)for(;r._timeline;)r._timeline._time!==(r._startTime+r._totalTime)/r._timeScale&&r.totalTime(r._totalTime,!0),r=r._timeline}this._gc&&this._enabled(!0,!1),(this._totalTime!==t||0===this._duration)&&this.render(t,e,!1)}return this},r.progress=r.totalProgress=function(t,e){return arguments.length?this.totalTime(this.duration()*t,e):this._time/this.duration()},r.startTime=function(t){return arguments.length?(t!==this._startTime&&(this._startTime=t,this.timeline&&this.timeline._sortChildren&&this.timeline.add(this,t-this._delay)),this):this._startTime},r.timeScale=function(t){if(!arguments.length)return this._timeScale;if(t=t||l,this._timeline&&this._timeline.smoothChildTiming){var e=this._pauseTime,i=e||0===e?e:this._timeline.totalTime();this._startTime=i-(i-this._startTime)*this._timeScale/t}return this._timeScale=t,this._uncache(!1)},r.reversed=function(t){return arguments.length?(t!=this._reversed&&(this._reversed=t,this.totalTime(this._timeline&&!this._timeline.smoothChildTiming?this.totalDuration()-this._totalTime:this._totalTime,!0)),this):this._reversed},r.paused=function(t){if(!arguments.length)return this._paused;if(t!=this._paused&&this._timeline){a||t||n.wake();var e=this._timeline,i=e.rawTime(),s=i-this._pauseTime;!t&&e.smoothChildTiming&&(this._startTime+=s,this._uncache(!1)),this._pauseTime=t?i:null,this._paused=t,this._active=this.isActive(),!t&&0!==s&&this._initted&&this.duration()&&this.render(e.smoothChildTiming?this._totalTime:(i-this._startTime)/this._timeScale,!0,!0)}return this._gc&&!t&&this._enabled(!0,!1),this};var C=d("core.SimpleTimeline",function(t){R.call(this,0,t),this.autoRemoveChildren=this.smoothChildTiming=!0});r=C.prototype=new R,r.constructor=C,r.kill()._gc=!1,r._first=r._last=null,r._sortChildren=!1,r.add=r.insert=function(t,e){var i,s;if(t._startTime=Number(e||0)+t._delay,t._paused&&this!==t._timeline&&(t._pauseTime=t._startTime+(this.rawTime()-t._startTime)/t._timeScale),t.timeline&&t.timeline._remove(t,!0),t.timeline=t._timeline=this,t._gc&&t._enabled(!0,!0),i=this._last,this._sortChildren)for(s=t._startTime;i&&i._startTime>s;)i=i._prev;return i?(t._next=i._next,i._next=t):(t._next=this._first,this._first=t),t._next?t._next._prev=t:this._last=t,t._prev=i,this._timeline&&this._uncache(!0),this},r._remove=function(t,e){return t.timeline===this&&(e||t._enabled(!1,!0),t.timeline=null,t._prev?t._prev._next=t._next:this._first===t&&(this._first=t._next),t._next?t._next._prev=t._prev:this._last===t&&(this._last=t._prev),this._timeline&&this._uncache(!0)),this},r.render=function(t,e,i){var s,r=this._first;for(this._totalTime=this._time=this._rawPrevTime=t;r;)s=r._next,(r._active||t>=r._startTime&&!r._paused)&&(r._reversed?r.render((r._dirty?r.totalDuration():r._totalDuration)-(t-r._startTime)*r._timeScale,e,i):r.render((t-r._startTime)*r._timeScale,e,i)),r=s},r.rawTime=function(){return a||n.wake(),this._totalTime};var O=d("TweenLite",function(e,i,s){if(R.call(this,i,s),this.render=O.prototype.render,null==e)throw"Cannot tween a null target.";this.target=e="string"!=typeof e?e:O.selector(e)||e;var r,n,a,o=e.jquery||e.length&&e!==t&&e[0]&&(e[0]===t||e[0].nodeType&&e[0].style&&!e.nodeType),h=this.vars.overwrite;if(this._overwrite=h=null==h?X[O.defaultOverwrite]:"number"==typeof h?h>>0:X[h],(o||e instanceof Array||e.push&&p(e))&&"number"!=typeof e[0])for(this._targets=a=_.call(e,0),this._propLookup=[],this._siblings=[],r=0;a.length>r;r++)n=a[r],n?"string"!=typeof n?n.length&&n!==t&&n[0]&&(n[0]===t||n[0].nodeType&&n[0].style&&!n.nodeType)?(a.splice(r--,1),this._targets=a=a.concat(_.call(n,0))):(this._siblings[r]=Y(n,this,!1),1===h&&this._siblings[r].length>1&&j(n,this,null,1,this._siblings[r])):(n=a[r--]=O.selector(n),"string"==typeof n&&a.splice(r+1,1)):a.splice(r--,1);else this._propLookup={},this._siblings=Y(e,this,!1),1===h&&this._siblings.length>1&&j(e,this,null,1,this._siblings);(this.vars.immediateRender||0===i&&0===this._delay&&this.vars.immediateRender!==!1)&&this.render(-this._delay,!1,!0)},!0),D=function(e){return e.length&&e!==t&&e[0]&&(e[0]===t||e[0].nodeType&&e[0].style&&!e.nodeType)},M=function(t,e){var i,s={};for(i in t)L[i]||i in e&&"x"!==i&&"y"!==i&&"width"!==i&&"height"!==i&&"className"!==i&&"border"!==i||!(!E[i]||E[i]&&E[i]._autoCSS)||(s[i]=t[i],delete t[i]);t.css=s};r=O.prototype=new R,r.constructor=O,r.kill()._gc=!1,r.ratio=0,r._firstPT=r._targets=r._overwrittenProps=r._startAt=null,r._notifyPluginsOfEnabled=!1,O.version="1.11.5",O.defaultEase=r._ease=new y(null,null,1,1),O.defaultOverwrite="auto",O.ticker=n,O.autoSleep=!0,O.selector=t.$||t.jQuery||function(e){return t.$?(O.selector=t.$,t.$(e)):t.document?t.document.getElementById("#"===e.charAt(0)?e.substr(1):e):e};var I=O._internals={isArray:p,isSelector:D},E=O._plugins={},N=O._tweenLookup={},F=0,L=I.reservedProps={ease:1,delay:1,overwrite:1,onComplete:1,onCompleteParams:1,onCompleteScope:1,useFrames:1,runBackwards:1,startAt:1,onUpdate:1,onUpdateParams:1,onUpdateScope:1,onStart:1,onStartParams:1,onStartScope:1,onReverseComplete:1,onReverseCompleteParams:1,onReverseCompleteScope:1,onRepeat:1,onRepeatParams:1,onRepeatScope:1,easeParams:1,yoyo:1,immediateRender:1,repeat:1,repeatDelay:1,data:1,paused:1,reversed:1,autoCSS:1},X={none:0,all:1,auto:2,concurrent:3,allOnStart:4,preexisting:5,"true":1,"false":0},z=R._rootFramesTimeline=new C,U=R._rootTimeline=new C;U._startTime=n.time,z._startTime=n.frame,U._active=z._active=!0,R._updateRoot=function(){if(U.render((n.time-U._startTime)*U._timeScale,!1,!1),z.render((n.frame-z._startTime)*z._timeScale,!1,!1),!(n.frame%120)){var t,e,i;for(i in N){for(e=N[i].tweens,t=e.length;--t>-1;)e[t]._gc&&e.splice(t,1);0===e.length&&delete N[i]}if(i=U._first,(!i||i._paused)&&O.autoSleep&&!z._first&&1===n._listeners.tick.length){for(;i&&i._paused;)i=i._next;i||n.sleep()}}},n.addEventListener("tick",R._updateRoot);var Y=function(t,e,i){var s,r,n=t._gsTweenID;if(N[n||(t._gsTweenID=n="t"+F++)]||(N[n]={target:t,tweens:[]}),e&&(s=N[n].tweens,s[r=s.length]=e,i))for(;--r>-1;)s[r]===e&&s.splice(r,1);return N[n].tweens},j=function(t,e,i,s,r){var n,a,o,h;if(1===s||s>=4){for(h=r.length,n=0;h>n;n++)if((o=r[n])!==e)o._gc||o._enabled(!1,!1)&&(a=!0);else if(5===s)break;return a}var _,u=e._startTime+l,p=[],c=0,f=0===e._duration;for(n=r.length;--n>-1;)(o=r[n])===e||o._gc||o._paused||(o._timeline!==e._timeline?(_=_||B(e,0,f),0===B(o,_,f)&&(p[c++]=o)):u>=o._startTime&&o._startTime+o.totalDuration()/o._timeScale>u&&((f||!o._initted)&&2e-10>=u-o._startTime||(p[c++]=o)));for(n=c;--n>-1;)o=p[n],2===s&&o._kill(i,t)&&(a=!0),(2!==s||!o._firstPT&&o._initted)&&o._enabled(!1,!1)&&(a=!0);return a},B=function(t,e,i){for(var s=t._timeline,r=s._timeScale,n=t._startTime;s._timeline;){if(n+=s._startTime,r*=s._timeScale,s._paused)return-100;s=s._timeline}return n/=r,n>e?n-e:i&&n===e||!t._initted&&2*l>n-e?l:(n+=t.totalDuration()/t._timeScale/r)>e+l?0:n-e-l};r._init=function(){var t,e,i,s,r=this.vars,n=this._overwrittenProps,a=this._duration,o=r.immediateRender,h=r.ease;if(r.startAt){if(this._startAt&&this._startAt.render(-1,!0),r.startAt.overwrite=0,r.startAt.immediateRender=!0,this._startAt=O.to(this.target,0,r.startAt),o)if(this._time>0)this._startAt=null;else if(0!==a)return}else if(r.runBackwards&&0!==a)if(this._startAt)this._startAt.render(-1,!0),this._startAt=null;else{i={};for(s in r)L[s]&&"autoCSS"!==s||(i[s]=r[s]);if(i.overwrite=0,i.data="isFromStart",this._startAt=O.to(this.target,0,i),r.immediateRender){if(0===this._time)return}else this._startAt.render(-1,!0)}if(this._ease=h?h instanceof y?r.easeParams instanceof Array?h.config.apply(h,r.easeParams):h:"function"==typeof h?new y(h,r.easeParams):T[h]||O.defaultEase:O.defaultEase,this._easeType=this._ease._type,this._easePower=this._ease._power,this._firstPT=null,this._targets)for(t=this._targets.length;--t>-1;)this._initProps(this._targets[t],this._propLookup[t]={},this._siblings[t],n?n[t]:null)&&(e=!0);else e=this._initProps(this.target,this._propLookup,this._siblings,n);if(e&&O._onPluginEvent("_onInitAllProps",this),n&&(this._firstPT||"function"!=typeof this.target&&this._enabled(!1,!1)),r.runBackwards)for(i=this._firstPT;i;)i.s+=i.c,i.c=-i.c,i=i._next;this._onUpdate=r.onUpdate,this._initted=!0},r._initProps=function(e,i,s,r){var n,a,o,h,l,_;if(null==e)return!1;this.vars.css||e.style&&e!==t&&e.nodeType&&E.css&&this.vars.autoCSS!==!1&&M(this.vars,e);for(n in this.vars){if(_=this.vars[n],L[n])_&&(_ instanceof Array||_.push&&p(_))&&-1!==_.join("").indexOf("{self}")&&(this.vars[n]=_=this._swapSelfInParams(_,this));else if(E[n]&&(h=new E[n])._onInitTween(e,this.vars[n],this)){for(this._firstPT=l={_next:this._firstPT,t:h,p:"setRatio",s:0,c:1,f:!0,n:n,pg:!0,pr:h._priority},a=h._overwriteProps.length;--a>-1;)i[h._overwriteProps[a]]=this._firstPT;(h._priority||h._onInitAllProps)&&(o=!0),(h._onDisable||h._onEnable)&&(this._notifyPluginsOfEnabled=!0)}else this._firstPT=i[n]=l={_next:this._firstPT,t:e,p:n,f:"function"==typeof e[n],n:n,pg:!1,pr:0},l.s=l.f?e[n.indexOf("set")||"function"!=typeof e["get"+n.substr(3)]?n:"get"+n.substr(3)]():parseFloat(e[n]),l.c="string"==typeof _&&"="===_.charAt(1)?parseInt(_.charAt(0)+"1",10)*Number(_.substr(2)):Number(_)-l.s||0;l&&l._next&&(l._next._prev=l)}return r&&this._kill(r,e)?this._initProps(e,i,s,r):this._overwrite>1&&this._firstPT&&s.length>1&&j(e,this,i,this._overwrite,s)?(this._kill(i,e),this._initProps(e,i,s,r)):o},r.render=function(t,e,i){var s,r,n,a,o=this._time,h=this._duration;if(t>=h)this._totalTime=this._time=h,this.ratio=this._ease._calcEnd?this._ease.getRatio(1):1,this._reversed||(s=!0,r="onComplete"),0===h&&(a=this._rawPrevTime,(0===t||0>a||a===l)&&a!==t&&(i=!0,a>l&&(r="onReverseComplete")),this._rawPrevTime=a=!e||t||0===a?t:l);else if(1e-7>t)this._totalTime=this._time=0,this.ratio=this._ease._calcEnd?this._ease.getRatio(0):0,(0!==o||0===h&&this._rawPrevTime>l)&&(r="onReverseComplete",s=this._reversed),0>t?(this._active=!1,0===h&&(this._rawPrevTime>=0&&(i=!0),this._rawPrevTime=a=!e||t||0===this._rawPrevTime?t:l)):this._initted||(i=!0);else if(this._totalTime=this._time=t,this._easeType){var _=t/h,u=this._easeType,p=this._easePower;(1===u||3===u&&_>=.5)&&(_=1-_),3===u&&(_*=2),1===p?_*=_:2===p?_*=_*_:3===p?_*=_*_*_:4===p&&(_*=_*_*_*_),this.ratio=1===u?1-_:2===u?_:.5>t/h?_/2:1-_/2}else this.ratio=this._ease.getRatio(t/h);if(this._time!==o||i){if(!this._initted){if(this._init(),!this._initted||this._gc)return;this._time&&!s?this.ratio=this._ease.getRatio(this._time/h):s&&this._ease._calcEnd&&(this.ratio=this._ease.getRatio(0===this._time?0:1))}for(this._active||!this._paused&&this._time!==o&&t>=0&&(this._active=!0),0===o&&(this._startAt&&(t>=0?this._startAt.render(t,e,i):r||(r="_dummyGS")),this.vars.onStart&&(0!==this._time||0===h)&&(e||this.vars.onStart.apply(this.vars.onStartScope||this,this.vars.onStartParams||v))),n=this._firstPT;n;)n.f?n.t[n.p](n.c*this.ratio+n.s):n.t[n.p]=n.c*this.ratio+n.s,n=n._next;this._onUpdate&&(0>t&&this._startAt&&this._startTime&&this._startAt.render(t,e,i),e||(this._time!==o||s)&&this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||v)),r&&(this._gc||(0>t&&this._startAt&&!this._onUpdate&&this._startTime&&this._startAt.render(t,e,i),s&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[r]&&this.vars[r].apply(this.vars[r+"Scope"]||this,this.vars[r+"Params"]||v),0===h&&this._rawPrevTime===l&&a!==l&&(this._rawPrevTime=0)))}},r._kill=function(t,e){if("all"===t&&(t=null),null==t&&(null==e||e===this.target))return this._enabled(!1,!1);e="string"!=typeof e?e||this._targets||this.target:O.selector(e)||e;var i,s,r,n,a,o,h,l;if((p(e)||D(e))&&"number"!=typeof e[0])for(i=e.length;--i>-1;)this._kill(t,e[i])&&(o=!0);else{if(this._targets){for(i=this._targets.length;--i>-1;)if(e===this._targets[i]){a=this._propLookup[i]||{},this._overwrittenProps=this._overwrittenProps||[],s=this._overwrittenProps[i]=t?this._overwrittenProps[i]||{}:"all";break}}else{if(e!==this.target)return!1;a=this._propLookup,s=this._overwrittenProps=t?this._overwrittenProps||{}:"all"}if(a){h=t||a,l=t!==s&&"all"!==s&&t!==a&&("object"!=typeof t||!t._tempKill);for(r in h)(n=a[r])&&(n.pg&&n.t._kill(h)&&(o=!0),n.pg&&0!==n.t._overwriteProps.length||(n._prev?n._prev._next=n._next:n===this._firstPT&&(this._firstPT=n._next),n._next&&(n._next._prev=n._prev),n._next=n._prev=null),delete a[r]),l&&(s[r]=1);!this._firstPT&&this._initted&&this._enabled(!1,!1)}}return o},r.invalidate=function(){return this._notifyPluginsOfEnabled&&O._onPluginEvent("_onDisable",this),this._firstPT=null,this._overwrittenProps=null,this._onUpdate=null,this._startAt=null,this._initted=this._active=this._notifyPluginsOfEnabled=!1,this._propLookup=this._targets?{}:[],this},r._enabled=function(t,e){if(a||n.wake(),t&&this._gc){var i,s=this._targets;if(s)for(i=s.length;--i>-1;)this._siblings[i]=Y(s[i],this,!0);else this._siblings=Y(this.target,this,!0)}return R.prototype._enabled.call(this,t,e),this._notifyPluginsOfEnabled&&this._firstPT?O._onPluginEvent(t?"_onEnable":"_onDisable",this):!1},O.to=function(t,e,i){return new O(t,e,i)},O.from=function(t,e,i){return i.runBackwards=!0,i.immediateRender=0!=i.immediateRender,new O(t,e,i)},O.fromTo=function(t,e,i,s){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,new O(t,e,s)},O.delayedCall=function(t,e,i,s,r){return new O(e,0,{delay:t,onComplete:e,onCompleteParams:i,onCompleteScope:s,onReverseComplete:e,onReverseCompleteParams:i,onReverseCompleteScope:s,immediateRender:!1,useFrames:r,overwrite:0})},O.set=function(t,e){return new O(t,0,e)},O.getTweensOf=function(t,e){if(null==t)return[];t="string"!=typeof t?t:O.selector(t)||t;var i,s,r,n;if((p(t)||D(t))&&"number"!=typeof t[0]){for(i=t.length,s=[];--i>-1;)s=s.concat(O.getTweensOf(t[i],e));for(i=s.length;--i>-1;)for(n=s[i],r=i;--r>-1;)n===s[r]&&s.splice(i,1)}else for(s=Y(t).concat(),i=s.length;--i>-1;)(s[i]._gc||e&&!s[i].isActive())&&s.splice(i,1);return s},O.killTweensOf=O.killDelayedCallsTo=function(t,e,i){"object"==typeof e&&(i=e,e=!1);for(var s=O.getTweensOf(t,e),r=s.length;--r>-1;)s[r]._kill(i,t)};var q=d("plugins.TweenPlugin",function(t,e){this._overwriteProps=(t||"").split(","),this._propName=this._overwriteProps[0],this._priority=e||0,this._super=q.prototype},!0);if(r=q.prototype,q.version="1.10.1",q.API=2,r._firstPT=null,r._addTween=function(t,e,i,s,r,n){var a,o;return null!=s&&(a="number"==typeof s||"="!==s.charAt(1)?Number(s)-i:parseInt(s.charAt(0)+"1",10)*Number(s.substr(2)))?(this._firstPT=o={_next:this._firstPT,t:t,p:e,s:i,c:a,f:"function"==typeof t[e],n:r||e,r:n},o._next&&(o._next._prev=o),o):void 0},r.setRatio=function(t){for(var e,i=this._firstPT,s=1e-6;i;)e=i.c*t+i.s,i.r?e=0|e+(e>0?.5:-.5):s>e&&e>-s&&(e=0),i.f?i.t[i.p](e):i.t[i.p]=e,i=i._next},r._kill=function(t){var e,i=this._overwriteProps,s=this._firstPT;if(null!=t[this._propName])this._overwriteProps=[];else for(e=i.length;--e>-1;)null!=t[i[e]]&&i.splice(e,1);for(;s;)null!=t[s.n]&&(s._next&&(s._next._prev=s._prev),s._prev?(s._prev._next=s._next,s._prev=null):this._firstPT===s&&(this._firstPT=s._next)),s=s._next;return!1},r._roundProps=function(t,e){for(var i=this._firstPT;i;)(t[this._propName]||null!=i.n&&t[i.n.split(this._propName+"_").join("")])&&(i.r=e),i=i._next},O._onPluginEvent=function(t,e){var i,s,r,n,a,o=e._firstPT;if("_onInitAllProps"===t){for(;o;){for(a=o._next,s=r;s&&s.pr>o.pr;)s=s._next;(o._prev=s?s._prev:n)?o._prev._next=o:r=o,(o._next=s)?s._prev=o:n=o,o=a}o=e._firstPT=r}for(;o;)o.pg&&"function"==typeof o.t[t]&&o.t[t]()&&(i=!0),o=o._next;return i},q.activate=function(t){for(var e=t.length;--e>-1;)t[e].API===q.API&&(E[(new t[e])._propName]=t[e]);return!0},m.plugin=function(t){if(!(t&&t.propName&&t.init&&t.API))throw"illegal plugin definition.";var e,i=t.propName,s=t.priority||0,r=t.overwriteProps,n={init:"_onInitTween",set:"setRatio",kill:"_kill",round:"_roundProps",initAll:"_onInitAllProps"},a=d("plugins."+i.charAt(0).toUpperCase()+i.substr(1)+"Plugin",function(){q.call(this,i,s),this._overwriteProps=r||[]},t.global===!0),o=a.prototype=new q(i);o.constructor=a,a.API=t.API;for(e in n)"function"==typeof t[e]&&(o[n[e]]=t[e]);return a.version=t.version,q.activate([a]),a},i=t._gsQueue){for(s=0;i.length>s;s++)i[s]();for(r in c)c[r].func||t.console.log("GSAP encountered missing dependency: com.greensock."+r)}a=!1}}(window);
/*!
 * VERSION: 0.1.6
 * DATE: 2013-02-13
 * UPDATES AND DOCS AT: http://www.greensock.com/jquery-gsap-plugin/
 *
 * Requires TweenLite version 1.8.0 or higher and CSSPlugin.
 *
 * @license Copyright (c) 2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 *
 * @author: Jack Doyle, jack@greensock.com
 */
(function(t){"use strict";var e,i,s,r=t.fn.animate,n=t.fn.stop,a=!0,o=function(t,e){"function"==typeof t&&this.each(t),e()},h=function(t,e,i,s,r){r="function"==typeof r?r:null,e="function"==typeof e?e:null,(e||r)&&(s[t]=r?o:i.each,s[t+"Scope"]=i,s[t+"Params"]=r?[e,r]:[e])},l={overwrite:1,delay:1,useFrames:1,runBackwards:1,easeParams:1,yoyo:1,immediateRender:1,repeat:1,repeatDelay:1,autoCSS:1},_=function(t,e){for(var i in l)l[i]&&void 0!==t[i]&&(e[i]=t[i])},u=function(t){return function(e){return t.getRatio(e)}},c={},f=function(){var r,n,a,o=window.GreenSockGlobals||window;if(e=o.TweenMax||o.TweenLite,e&&(r=(e.version+".0.0").split("."),n=!(Number(r[0])>0&&Number(r[1])>7),o=o.com.greensock,i=o.plugins.CSSPlugin,c=o.easing.Ease.map||{}),!e||!i||n)return e=null,!s&&window.console&&(window.console.log("The jquery.gsap.js plugin requires the TweenMax (or at least TweenLite and CSSPlugin) JavaScript file(s)."+(n?" Version "+r.join(".")+" is too old.":"")),s=!0),void 0;if(t.easing){for(a in c)t.easing[a]=u(c[a]);f=!1}};t.fn.animate=function(s,n,o,l){if(s=s||{},f&&(f(),!e||!i))return r.call(this,s,n,o,l);if(!a||s.skipGSAP===!0||"object"==typeof n&&"function"==typeof n.step||null!=s.scrollTop||null!=s.scrollLeft)return r.call(this,s,n,o,l);var u,p,m,d,g=t.speed(n,o,l),v={ease:c[g.easing]||(g.easing===!1?c.linear:c.swing)},T=this,y="object"==typeof n?n.specialEasing:null;for(p in s){if(u=s[p],u instanceof Array&&c[u[1]]&&(y=y||{},y[p]=u[1],u=u[0]),"toggle"===u||"hide"===u||"show"===u)return r.call(this,s,n,o,l);v[-1===p.indexOf("-")?p:t.camelCase(p)]=u}if(y){d=[];for(p in y)u=d[d.length]={},_(v,u),u.ease=c[y[p]]||v.ease,-1!==p.indexOf("-")&&(p=t.camelCase(p)),u[p]=v[p];0===d.length&&(d=null)}return m=function(i){if(d)for(var s=d.length;--s>-1;)e.to(T,t.fx.off?0:g.duration/1e3,d[s]);h("onComplete",g.old,T,v,i),e.to(T,t.fx.off?0:g.duration/1e3,v)},g.queue!==!1?T.queue(g.queue,m):m(),T},t.fn.stop=function(t,i){if(n.call(this,t,i),e){if(i)for(var s,r=e.getTweensOf(this),a=r.length;--a>-1;)s=r[a].totalTime()/r[a].totalDuration(),s>0&&1>s&&r[a].seek(r[a].totalDuration());e.killTweensOf(this)}return this},t.gsap={enabled:function(t){a=t},version:"0.1.6"}})(jQuery);
/*!
 * VERSION: beta 1.9.3
 * DATE: 2013-04-02
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 **/
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";window._gsDefine("easing.Back",["easing.Ease"],function(t){var e,i,s,r=window.GreenSockGlobals||window,n=r.com.greensock,a=2*Math.PI,o=Math.PI/2,h=n._class,l=function(e,i){var s=h("easing."+e,function(){},!0),r=s.prototype=new t;return r.constructor=s,r.getRatio=i,s},_=t.register||function(){},u=function(t,e,i,s){var r=h("easing."+t,{easeOut:new e,easeIn:new i,easeInOut:new s},!0);return _(r,t),r},c=function(t,e,i){this.t=t,this.v=e,i&&(this.next=i,i.prev=this,this.c=i.v-e,this.gap=i.t-t)},p=function(e,i){var s=h("easing."+e,function(t){this._p1=t||0===t?t:1.70158,this._p2=1.525*this._p1},!0),r=s.prototype=new t;return r.constructor=s,r.getRatio=i,r.config=function(t){return new s(t)},s},f=u("Back",p("BackOut",function(t){return(t-=1)*t*((this._p1+1)*t+this._p1)+1}),p("BackIn",function(t){return t*t*((this._p1+1)*t-this._p1)}),p("BackInOut",function(t){return 1>(t*=2)?.5*t*t*((this._p2+1)*t-this._p2):.5*((t-=2)*t*((this._p2+1)*t+this._p2)+2)})),m=h("easing.SlowMo",function(t,e,i){e=e||0===e?e:.7,null==t?t=.7:t>1&&(t=1),this._p=1!==t?e:0,this._p1=(1-t)/2,this._p2=t,this._p3=this._p1+this._p2,this._calcEnd=i===!0},!0),d=m.prototype=new t;return d.constructor=m,d.getRatio=function(t){var e=t+(.5-t)*this._p;return this._p1>t?this._calcEnd?1-(t=1-t/this._p1)*t:e-(t=1-t/this._p1)*t*t*t*e:t>this._p3?this._calcEnd?1-(t=(t-this._p3)/this._p1)*t:e+(t-e)*(t=(t-this._p3)/this._p1)*t*t*t:this._calcEnd?1:e},m.ease=new m(.7,.7),d.config=m.config=function(t,e,i){return new m(t,e,i)},e=h("easing.SteppedEase",function(t){t=t||1,this._p1=1/t,this._p2=t+1},!0),d=e.prototype=new t,d.constructor=e,d.getRatio=function(t){return 0>t?t=0:t>=1&&(t=.999999999),(this._p2*t>>0)*this._p1},d.config=e.config=function(t){return new e(t)},i=h("easing.RoughEase",function(e){e=e||{};for(var i,s,r,n,a,o,h=e.taper||"none",l=[],_=0,u=0|(e.points||20),p=u,f=e.randomize!==!1,m=e.clamp===!0,d=e.template instanceof t?e.template:null,g="number"==typeof e.strength?.4*e.strength:.4;--p>-1;)i=f?Math.random():1/u*p,s=d?d.getRatio(i):i,"none"===h?r=g:"out"===h?(n=1-i,r=n*n*g):"in"===h?r=i*i*g:.5>i?(n=2*i,r=.5*n*n*g):(n=2*(1-i),r=.5*n*n*g),f?s+=Math.random()*r-.5*r:p%2?s+=.5*r:s-=.5*r,m&&(s>1?s=1:0>s&&(s=0)),l[_++]={x:i,y:s};for(l.sort(function(t,e){return t.x-e.x}),o=new c(1,1,null),p=u;--p>-1;)a=l[p],o=new c(a.x,a.y,o);this._prev=new c(0,0,0!==o.t?o:o.next)},!0),d=i.prototype=new t,d.constructor=i,d.getRatio=function(t){var e=this._prev;if(t>e.t){for(;e.next&&t>=e.t;)e=e.next;e=e.prev}else for(;e.prev&&e.t>=t;)e=e.prev;return this._prev=e,e.v+(t-e.t)/e.gap*e.c},d.config=function(t){return new i(t)},i.ease=new i,u("Bounce",l("BounceOut",function(t){return 1/2.75>t?7.5625*t*t:2/2.75>t?7.5625*(t-=1.5/2.75)*t+.75:2.5/2.75>t?7.5625*(t-=2.25/2.75)*t+.9375:7.5625*(t-=2.625/2.75)*t+.984375}),l("BounceIn",function(t){return 1/2.75>(t=1-t)?1-7.5625*t*t:2/2.75>t?1-(7.5625*(t-=1.5/2.75)*t+.75):2.5/2.75>t?1-(7.5625*(t-=2.25/2.75)*t+.9375):1-(7.5625*(t-=2.625/2.75)*t+.984375)}),l("BounceInOut",function(t){var e=.5>t;return t=e?1-2*t:2*t-1,t=1/2.75>t?7.5625*t*t:2/2.75>t?7.5625*(t-=1.5/2.75)*t+.75:2.5/2.75>t?7.5625*(t-=2.25/2.75)*t+.9375:7.5625*(t-=2.625/2.75)*t+.984375,e?.5*(1-t):.5*t+.5})),u("Circ",l("CircOut",function(t){return Math.sqrt(1-(t-=1)*t)}),l("CircIn",function(t){return-(Math.sqrt(1-t*t)-1)}),l("CircInOut",function(t){return 1>(t*=2)?-.5*(Math.sqrt(1-t*t)-1):.5*(Math.sqrt(1-(t-=2)*t)+1)})),s=function(e,i,s){var r=h("easing."+e,function(t,e){this._p1=t||1,this._p2=e||s,this._p3=this._p2/a*(Math.asin(1/this._p1)||0)},!0),n=r.prototype=new t;return n.constructor=r,n.getRatio=i,n.config=function(t,e){return new r(t,e)},r},u("Elastic",s("ElasticOut",function(t){return this._p1*Math.pow(2,-10*t)*Math.sin((t-this._p3)*a/this._p2)+1},.3),s("ElasticIn",function(t){return-(this._p1*Math.pow(2,10*(t-=1))*Math.sin((t-this._p3)*a/this._p2))},.3),s("ElasticInOut",function(t){return 1>(t*=2)?-.5*this._p1*Math.pow(2,10*(t-=1))*Math.sin((t-this._p3)*a/this._p2):.5*this._p1*Math.pow(2,-10*(t-=1))*Math.sin((t-this._p3)*a/this._p2)+1},.45)),u("Expo",l("ExpoOut",function(t){return 1-Math.pow(2,-10*t)}),l("ExpoIn",function(t){return Math.pow(2,10*(t-1))-.001}),l("ExpoInOut",function(t){return 1>(t*=2)?.5*Math.pow(2,10*(t-1)):.5*(2-Math.pow(2,-10*(t-1)))})),u("Sine",l("SineOut",function(t){return Math.sin(t*o)}),l("SineIn",function(t){return-Math.cos(t*o)+1}),l("SineInOut",function(t){return-.5*(Math.cos(Math.PI*t)-1)})),h("easing.EaseLookup",{find:function(e){return t.map[e]}},!0),_(r.SlowMo,"SlowMo","ease,"),_(i,"RoughEase","ease,"),_(e,"SteppedEase","ease,"),f},!0)}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: 0.2.0
 * DATE: 2013-07-10
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";window._gsDefine.plugin({propName:"attr",API:2,version:"0.2.0",init:function(t,e){var i;if("function"!=typeof t.setAttribute)return!1;this._target=t,this._proxy={};for(i in e)this._addTween(this._proxy,i,parseFloat(t.getAttribute(i)),e[i],i)&&this._overwriteProps.push(i);return!0},set:function(t){this._super.setRatio.call(this,t);for(var e,i=this._overwriteProps,s=i.length;--s>-1;)e=i[s],this._target.setAttribute(e,this._proxy[e]+"")}})}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: beta 1.3.0
 * DATE: 2013-10-21
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 **/
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";var t=180/Math.PI,e=[],i=[],s=[],r={},n=function(t,e,i,s){this.a=t,this.b=e,this.c=i,this.d=s,this.da=s-t,this.ca=i-t,this.ba=e-t},a=",x,y,z,left,top,right,bottom,marginTop,marginLeft,marginRight,marginBottom,paddingLeft,paddingTop,paddingRight,paddingBottom,backgroundPosition,backgroundPosition_y,",o=function(t,e,i,s){var r={a:t},n={},a={},o={c:s},h=(t+e)/2,l=(e+i)/2,u=(i+s)/2,_=(h+l)/2,c=(l+u)/2,p=(c-_)/8;return r.b=h+(t-h)/4,n.b=_+p,r.c=n.a=(r.b+n.b)/2,n.c=a.a=(_+c)/2,a.b=c-p,o.b=u+(s-u)/4,a.c=o.a=(a.b+o.b)/2,[r,n,a,o]},h=function(t,r,n,a,h){var l,u,_,c,p,f,d,m,g,v,y,T,w,b=t.length-1,x=0,P=t[0].a;for(l=0;b>l;l++)p=t[x],u=p.a,_=p.d,c=t[x+1].d,h?(y=e[l],T=i[l],w=.25*(T+y)*r/(a?.5:s[l]||.5),f=_-(_-u)*(a?.5*r:0!==y?w/y:0),d=_+(c-_)*(a?.5*r:0!==T?w/T:0),m=_-(f+((d-f)*(3*y/(y+T)+.5)/4||0))):(f=_-.5*(_-u)*r,d=_+.5*(c-_)*r,m=_-(f+d)/2),f+=m,d+=m,p.c=g=f,p.b=0!==l?P:P=p.a+.6*(p.c-p.a),p.da=_-u,p.ca=g-u,p.ba=P-u,n?(v=o(u,P,g,_),t.splice(x,1,v[0],v[1],v[2],v[3]),x+=4):x++,P=d;p=t[x],p.b=P,p.c=P+.4*(p.d-P),p.da=p.d-p.a,p.ca=p.c-p.a,p.ba=P-p.a,n&&(v=o(p.a,P,p.c,p.d),t.splice(x,1,v[0],v[1],v[2],v[3]))},l=function(t,s,r,a){var o,h,l,u,_,c,p=[];if(a)for(t=[a].concat(t),h=t.length;--h>-1;)"string"==typeof(c=t[h][s])&&"="===c.charAt(1)&&(t[h][s]=a[s]+Number(c.charAt(0)+c.substr(2)));if(o=t.length-2,0>o)return p[0]=new n(t[0][s],0,0,t[-1>o?0:1][s]),p;for(h=0;o>h;h++)l=t[h][s],u=t[h+1][s],p[h]=new n(l,0,0,u),r&&(_=t[h+2][s],e[h]=(e[h]||0)+(u-l)*(u-l),i[h]=(i[h]||0)+(_-u)*(_-u));return p[h]=new n(t[h][s],0,0,t[h+1][s]),p},u=function(t,n,o,u,_,c){var p,f,d,m,g,v,y,T,w={},b=[],x=c||t[0];_="string"==typeof _?","+_+",":a,null==n&&(n=1);for(f in t[0])b.push(f);if(t.length>1){for(T=t[t.length-1],y=!0,p=b.length;--p>-1;)if(f=b[p],Math.abs(x[f]-T[f])>.05){y=!1;break}y&&(t=t.concat(),c&&t.unshift(c),t.push(t[1]),c=t[t.length-3])}for(e.length=i.length=s.length=0,p=b.length;--p>-1;)f=b[p],r[f]=-1!==_.indexOf(","+f+","),w[f]=l(t,f,r[f],c);for(p=e.length;--p>-1;)e[p]=Math.sqrt(e[p]),i[p]=Math.sqrt(i[p]);if(!u){for(p=b.length;--p>-1;)if(r[f])for(d=w[b[p]],v=d.length-1,m=0;v>m;m++)g=d[m+1].da/i[m]+d[m].da/e[m],s[m]=(s[m]||0)+g*g;for(p=s.length;--p>-1;)s[p]=Math.sqrt(s[p])}for(p=b.length,m=o?4:1;--p>-1;)f=b[p],d=w[f],h(d,n,o,u,r[f]),y&&(d.splice(0,m),d.splice(d.length-m,m));return w},_=function(t,e,i){e=e||"soft";var s,r,a,o,h,l,u,_,c,p,f,d={},m="cubic"===e?3:2,g="soft"===e,v=[];if(g&&i&&(t=[i].concat(t)),null==t||m+1>t.length)throw"invalid Bezier data";for(c in t[0])v.push(c);for(l=v.length;--l>-1;){for(c=v[l],d[c]=h=[],p=0,_=t.length,u=0;_>u;u++)s=null==i?t[u][c]:"string"==typeof(f=t[u][c])&&"="===f.charAt(1)?i[c]+Number(f.charAt(0)+f.substr(2)):Number(f),g&&u>1&&_-1>u&&(h[p++]=(s+h[p-2])/2),h[p++]=s;for(_=p-m+1,p=0,u=0;_>u;u+=m)s=h[u],r=h[u+1],a=h[u+2],o=2===m?0:h[u+3],h[p++]=f=3===m?new n(s,r,a,o):new n(s,(2*r+s)/3,(2*r+a)/3,a);h.length=p}return d},c=function(t,e,i){for(var s,r,n,a,o,h,l,u,_,c,p,f=1/i,d=t.length;--d>-1;)for(c=t[d],n=c.a,a=c.d-n,o=c.c-n,h=c.b-n,s=r=0,u=1;i>=u;u++)l=f*u,_=1-l,s=r-(r=(l*l*a+3*_*(l*o+_*h))*l),p=d*i+u-1,e[p]=(e[p]||0)+s*s},p=function(t,e){e=e>>0||6;var i,s,r,n,a=[],o=[],h=0,l=0,u=e-1,_=[],p=[];for(i in t)c(t[i],a,e);for(r=a.length,s=0;r>s;s++)h+=Math.sqrt(a[s]),n=s%e,p[n]=h,n===u&&(l+=h,n=s/e>>0,_[n]=p,o[n]=l,h=0,p=[]);return{length:l,lengths:o,segments:_}},f=window._gsDefine.plugin({propName:"bezier",priority:-1,API:2,global:!0,init:function(t,e,i){this._target=t,e instanceof Array&&(e={values:e}),this._func={},this._round={},this._props=[],this._timeRes=null==e.timeResolution?6:parseInt(e.timeResolution,10);var s,r,n,a,o,h=e.values||[],l={},c=h[0],f=e.autoRotate||i.vars.orientToBezier;this._autoRotate=f?f instanceof Array?f:[["x","y","rotation",f===!0?0:Number(f)||0]]:null;for(s in c)this._props.push(s);for(n=this._props.length;--n>-1;)s=this._props[n],this._overwriteProps.push(s),r=this._func[s]="function"==typeof t[s],l[s]=r?t[s.indexOf("set")||"function"!=typeof t["get"+s.substr(3)]?s:"get"+s.substr(3)]():parseFloat(t[s]),o||l[s]!==h[0][s]&&(o=l);if(this._beziers="cubic"!==e.type&&"quadratic"!==e.type&&"soft"!==e.type?u(h,isNaN(e.curviness)?1:e.curviness,!1,"thruBasic"===e.type,e.correlate,o):_(h,e.type,l),this._segCount=this._beziers[s].length,this._timeRes){var d=p(this._beziers,this._timeRes);this._length=d.length,this._lengths=d.lengths,this._segments=d.segments,this._l1=this._li=this._s1=this._si=0,this._l2=this._lengths[0],this._curSeg=this._segments[0],this._s2=this._curSeg[0],this._prec=1/this._curSeg.length}if(f=this._autoRotate)for(f[0]instanceof Array||(this._autoRotate=f=[f]),n=f.length;--n>-1;)for(a=0;3>a;a++)s=f[n][a],this._func[s]="function"==typeof t[s]?t[s.indexOf("set")||"function"!=typeof t["get"+s.substr(3)]?s:"get"+s.substr(3)]:!1;return!0},set:function(e){var i,s,r,n,a,o,h,l,u,_,c=this._segCount,p=this._func,f=this._target;if(this._timeRes){if(u=this._lengths,_=this._curSeg,e*=this._length,r=this._li,e>this._l2&&c-1>r){for(l=c-1;l>r&&e>=(this._l2=u[++r]););this._l1=u[r-1],this._li=r,this._curSeg=_=this._segments[r],this._s2=_[this._s1=this._si=0]}else if(this._l1>e&&r>0){for(;r>0&&(this._l1=u[--r])>=e;);0===r&&this._l1>e?this._l1=0:r++,this._l2=u[r],this._li=r,this._curSeg=_=this._segments[r],this._s1=_[(this._si=_.length-1)-1]||0,this._s2=_[this._si]}if(i=r,e-=this._l1,r=this._si,e>this._s2&&_.length-1>r){for(l=_.length-1;l>r&&e>=(this._s2=_[++r]););this._s1=_[r-1],this._si=r}else if(this._s1>e&&r>0){for(;r>0&&(this._s1=_[--r])>=e;);0===r&&this._s1>e?this._s1=0:r++,this._s2=_[r],this._si=r}o=(r+(e-this._s1)/(this._s2-this._s1))*this._prec}else i=0>e?0:e>=1?c-1:c*e>>0,o=(e-i*(1/c))*c;for(s=1-o,r=this._props.length;--r>-1;)n=this._props[r],a=this._beziers[n][i],h=(o*o*a.da+3*s*(o*a.ca+s*a.ba))*o+a.a,this._round[n]&&(h=h+(h>0?.5:-.5)>>0),p[n]?f[n](h):f[n]=h;if(this._autoRotate){var d,m,g,v,y,T,w,b=this._autoRotate;for(r=b.length;--r>-1;)n=b[r][2],T=b[r][3]||0,w=b[r][4]===!0?1:t,a=this._beziers[b[r][0]],d=this._beziers[b[r][1]],a&&d&&(a=a[i],d=d[i],m=a.a+(a.b-a.a)*o,v=a.b+(a.c-a.b)*o,m+=(v-m)*o,v+=(a.c+(a.d-a.c)*o-v)*o,g=d.a+(d.b-d.a)*o,y=d.b+(d.c-d.b)*o,g+=(y-g)*o,y+=(d.c+(d.d-d.c)*o-y)*o,h=Math.atan2(y-g,v-m)*w+T,p[n]?f[n](h):f[n]=h)}}}),d=f.prototype;f.bezierThrough=u,f.cubicToQuadratic=o,f._autoCSS=!0,f.quadraticToCubic=function(t,e,i){return new n(t,(2*e+t)/3,(2*e+i)/3,i)},f._cssRegister=function(){var t=window._gsDefine.globals.CSSPlugin;if(t){var e=t._internals,i=e._parseToProxy,s=e._setPluginRatio,r=e.CSSPropTween;e._registerComplexSpecialProp("bezier",{parser:function(t,e,n,a,o,h){e instanceof Array&&(e={values:e}),h=new f;var l,u,_,c=e.values,p=c.length-1,d=[],m={};if(0>p)return o;for(l=0;p>=l;l++)_=i(t,c[l],a,o,h,p!==l),d[l]=_.end;for(u in e)m[u]=e[u];return m.values=d,o=new r(t,"bezier",0,0,_.pt,2),o.data=_,o.plugin=h,o.setRatio=s,0===m.autoRotate&&(m.autoRotate=!0),!m.autoRotate||m.autoRotate instanceof Array||(l=m.autoRotate===!0?0:Number(m.autoRotate),m.autoRotate=null!=_.end.left?[["left","top","rotation",l,!1]]:null!=_.end.x?[["x","y","rotation",l,!1]]:!1),m.autoRotate&&(a._transform||a._enableTransforms(!1),_.autoRotate=a._target._gsTransform),h._onInitTween(_.proxy,m,a._tween),o}})}},d._roundProps=function(t,e){for(var i=this._overwriteProps,s=i.length;--s>-1;)(t[i[s]]||t.bezier||t.bezierThrough)&&(this._round[i[s]]=e)},d._kill=function(t){var e,i,s=this._props;for(e in this._beziers)if(e in t)for(delete this._beziers[e],delete this._func[e],i=s.length;--i>-1;)s[i]===e&&s.splice(i,1);return this._super._kill.call(this,t)}}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: 1.11.5
 * DATE: 2014-02-20
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";window._gsDefine("plugins.CSSPlugin",["plugins.TweenPlugin","TweenLite"],function(t,e){var i,r,s,n,a=function(){t.call(this,"css"),this._overwriteProps.length=0,this.setRatio=a.prototype.setRatio},o={},l=a.prototype=new t("css");l.constructor=a,a.version="1.11.5",a.API=2,a.defaultTransformPerspective=0,l="px",a.suffixMap={top:l,right:l,bottom:l,left:l,width:l,height:l,fontSize:l,padding:l,margin:l,perspective:l,lineHeight:""};var h,u,_,p,f,c,d=/(?:\d|\-\d|\.\d|\-\.\d)+/g,m=/(?:\d|\-\d|\.\d|\-\.\d|\+=\d|\-=\d|\+=.\d|\-=\.\d)+/g,g=/(?:\+=|\-=|\-|\b)[\d\-\.]+[a-zA-Z0-9]*(?:%|\b)/gi,v=/[^\d\-\.]/g,y=/(?:\d|\-|\+|=|#|\.)*/g,T=/opacity *= *([^)]*)/,x=/opacity:([^;]*)/,w=/alpha\(opacity *=.+?\)/i,b=/^(rgb|hsl)/,P=/([A-Z])/g,S=/-([a-z])/gi,R=/(^(?:url\(\"|url\())|(?:(\"\))$|\)$)/gi,k=function(t,e){return e.toUpperCase()},C=/(?:Left|Right|Width)/i,A=/(M11|M12|M21|M22)=[\d\-\.e]+/gi,O=/progid\:DXImageTransform\.Microsoft\.Matrix\(.+?\)/i,D=/,(?=[^\)]*(?:\(|$))/gi,M=Math.PI/180,L=180/Math.PI,N={},X=document,I=X.createElement("div"),E=X.createElement("img"),F=a._internals={_specialProps:o},Y=navigator.userAgent,z=function(){var t,e=Y.indexOf("Android"),i=X.createElement("div");return _=-1!==Y.indexOf("Safari")&&-1===Y.indexOf("Chrome")&&(-1===e||Number(Y.substr(e+8,1))>3),f=_&&6>Number(Y.substr(Y.indexOf("Version/")+8,1)),p=-1!==Y.indexOf("Firefox"),/MSIE ([0-9]{1,}[\.0-9]{0,})/.exec(Y)&&(c=parseFloat(RegExp.$1)),i.innerHTML="<a style='top:1px;opacity:.55;'>a</a>",t=i.getElementsByTagName("a")[0],t?/^0.55/.test(t.style.opacity):!1}(),U=function(t){return T.test("string"==typeof t?t:(t.currentStyle?t.currentStyle.filter:t.style.filter)||"")?parseFloat(RegExp.$1)/100:1},B=function(t){window.console&&console.log(t)},j="",W="",V=function(t,e){e=e||I;var i,r,s=e.style;if(void 0!==s[t])return t;for(t=t.charAt(0).toUpperCase()+t.substr(1),i=["O","Moz","ms","Ms","Webkit"],r=5;--r>-1&&void 0===s[i[r]+t];);return r>=0?(W=3===r?"ms":i[r],j="-"+W.toLowerCase()+"-",W+t):null},q=X.defaultView?X.defaultView.getComputedStyle:function(){},H=a.getStyle=function(t,e,i,r,s){var n;return z||"opacity"!==e?(!r&&t.style[e]?n=t.style[e]:(i=i||q(t,null))?(t=i.getPropertyValue(e.replace(P,"-$1").toLowerCase()),n=t||i.length?t:i[e]):t.currentStyle&&(n=t.currentStyle[e]),null==s||n&&"none"!==n&&"auto"!==n&&"auto auto"!==n?n:s):U(t)},Q=function(t,e,i,r,s){if("px"===r||!r)return i;if("auto"===r||!i)return 0;var n,a=C.test(e),o=t,l=I.style,h=0>i;return h&&(i=-i),"%"===r&&-1!==e.indexOf("border")?n=i/100*(a?t.clientWidth:t.clientHeight):(l.cssText="border:0 solid red;position:"+H(t,"position")+";line-height:0;","%"!==r&&o.appendChild?l[a?"borderLeftWidth":"borderTopWidth"]=i+r:(o=t.parentNode||X.body,l[a?"width":"height"]=i+r),o.appendChild(I),n=parseFloat(I[a?"offsetWidth":"offsetHeight"]),o.removeChild(I),0!==n||s||(n=Q(t,e,i,r,!0))),h?-n:n},Z=function(t,e,i){if("absolute"!==H(t,"position",i))return 0;var r="left"===e?"Left":"Top",s=H(t,"margin"+r,i);return t["offset"+r]-(Q(t,e,parseFloat(s),s.replace(y,""))||0)},$=function(t,e){var i,r,s={};if(e=e||q(t,null))if(i=e.length)for(;--i>-1;)s[e[i].replace(S,k)]=e.getPropertyValue(e[i]);else for(i in e)s[i]=e[i];else if(e=t.currentStyle||t.style)for(i in e)"string"==typeof i&&void 0===s[i]&&(s[i.replace(S,k)]=e[i]);return z||(s.opacity=U(t)),r=be(t,e,!1),s.rotation=r.rotation,s.skewX=r.skewX,s.scaleX=r.scaleX,s.scaleY=r.scaleY,s.x=r.x,s.y=r.y,we&&(s.z=r.z,s.rotationX=r.rotationX,s.rotationY=r.rotationY,s.scaleZ=r.scaleZ),s.filters&&delete s.filters,s},G=function(t,e,i,r,s){var n,a,o,l={},h=t.style;for(a in i)"cssText"!==a&&"length"!==a&&isNaN(a)&&(e[a]!==(n=i[a])||s&&s[a])&&-1===a.indexOf("Origin")&&("number"==typeof n||"string"==typeof n)&&(l[a]="auto"!==n||"left"!==a&&"top"!==a?""!==n&&"auto"!==n&&"none"!==n||"string"!=typeof e[a]||""===e[a].replace(v,"")?n:0:Z(t,a),void 0!==h[a]&&(o=new _e(h,a,h[a],o)));if(r)for(a in r)"className"!==a&&(l[a]=r[a]);return{difs:l,firstMPT:o}},K={width:["Left","Right"],height:["Top","Bottom"]},J=["marginLeft","marginRight","marginTop","marginBottom"],te=function(t,e,i){var r=parseFloat("width"===e?t.offsetWidth:t.offsetHeight),s=K[e],n=s.length;for(i=i||q(t,null);--n>-1;)r-=parseFloat(H(t,"padding"+s[n],i,!0))||0,r-=parseFloat(H(t,"border"+s[n]+"Width",i,!0))||0;return r},ee=function(t,e){(null==t||""===t||"auto"===t||"auto auto"===t)&&(t="0 0");var i=t.split(" "),r=-1!==t.indexOf("left")?"0%":-1!==t.indexOf("right")?"100%":i[0],s=-1!==t.indexOf("top")?"0%":-1!==t.indexOf("bottom")?"100%":i[1];return null==s?s="0":"center"===s&&(s="50%"),("center"===r||isNaN(parseFloat(r))&&-1===(r+"").indexOf("="))&&(r="50%"),e&&(e.oxp=-1!==r.indexOf("%"),e.oyp=-1!==s.indexOf("%"),e.oxr="="===r.charAt(1),e.oyr="="===s.charAt(1),e.ox=parseFloat(r.replace(v,"")),e.oy=parseFloat(s.replace(v,""))),r+" "+s+(i.length>2?" "+i[2]:"")},ie=function(t,e){return"string"==typeof t&&"="===t.charAt(1)?parseInt(t.charAt(0)+"1",10)*parseFloat(t.substr(2)):parseFloat(t)-parseFloat(e)},re=function(t,e){return null==t?e:"string"==typeof t&&"="===t.charAt(1)?parseInt(t.charAt(0)+"1",10)*Number(t.substr(2))+e:parseFloat(t)},se=function(t,e,i,r){var s,n,a,o,l=1e-6;return null==t?o=e:"number"==typeof t?o=t:(s=360,n=t.split("_"),a=Number(n[0].replace(v,""))*(-1===t.indexOf("rad")?1:L)-("="===t.charAt(1)?0:e),n.length&&(r&&(r[i]=e+a),-1!==t.indexOf("short")&&(a%=s,a!==a%(s/2)&&(a=0>a?a+s:a-s)),-1!==t.indexOf("_cw")&&0>a?a=(a+9999999999*s)%s-(0|a/s)*s:-1!==t.indexOf("ccw")&&a>0&&(a=(a-9999999999*s)%s-(0|a/s)*s)),o=e+a),l>o&&o>-l&&(o=0),o},ne={aqua:[0,255,255],lime:[0,255,0],silver:[192,192,192],black:[0,0,0],maroon:[128,0,0],teal:[0,128,128],blue:[0,0,255],navy:[0,0,128],white:[255,255,255],fuchsia:[255,0,255],olive:[128,128,0],yellow:[255,255,0],orange:[255,165,0],gray:[128,128,128],purple:[128,0,128],green:[0,128,0],red:[255,0,0],pink:[255,192,203],cyan:[0,255,255],transparent:[255,255,255,0]},ae=function(t,e,i){return t=0>t?t+1:t>1?t-1:t,0|255*(1>6*t?e+6*(i-e)*t:.5>t?i:2>3*t?e+6*(i-e)*(2/3-t):e)+.5},oe=function(t){var e,i,r,s,n,a;return t&&""!==t?"number"==typeof t?[t>>16,255&t>>8,255&t]:(","===t.charAt(t.length-1)&&(t=t.substr(0,t.length-1)),ne[t]?ne[t]:"#"===t.charAt(0)?(4===t.length&&(e=t.charAt(1),i=t.charAt(2),r=t.charAt(3),t="#"+e+e+i+i+r+r),t=parseInt(t.substr(1),16),[t>>16,255&t>>8,255&t]):"hsl"===t.substr(0,3)?(t=t.match(d),s=Number(t[0])%360/360,n=Number(t[1])/100,a=Number(t[2])/100,i=.5>=a?a*(n+1):a+n-a*n,e=2*a-i,t.length>3&&(t[3]=Number(t[3])),t[0]=ae(s+1/3,e,i),t[1]=ae(s,e,i),t[2]=ae(s-1/3,e,i),t):(t=t.match(d)||ne.transparent,t[0]=Number(t[0]),t[1]=Number(t[1]),t[2]=Number(t[2]),t.length>3&&(t[3]=Number(t[3])),t)):ne.black},le="(?:\\b(?:(?:rgb|rgba|hsl|hsla)\\(.+?\\))|\\B#.+?\\b";for(l in ne)le+="|"+l+"\\b";le=RegExp(le+")","gi");var he=function(t,e,i,r){if(null==t)return function(t){return t};var s,n=e?(t.match(le)||[""])[0]:"",a=t.split(n).join("").match(g)||[],o=t.substr(0,t.indexOf(a[0])),l=")"===t.charAt(t.length-1)?")":"",h=-1!==t.indexOf(" ")?" ":",",u=a.length,_=u>0?a[0].replace(d,""):"";return u?s=e?function(t){var e,p,f,c;if("number"==typeof t)t+=_;else if(r&&D.test(t)){for(c=t.replace(D,"|").split("|"),f=0;c.length>f;f++)c[f]=s(c[f]);return c.join(",")}if(e=(t.match(le)||[n])[0],p=t.split(e).join("").match(g)||[],f=p.length,u>f--)for(;u>++f;)p[f]=i?p[0|(f-1)/2]:a[f];return o+p.join(h)+h+e+l+(-1!==t.indexOf("inset")?" inset":"")}:function(t){var e,n,p;if("number"==typeof t)t+=_;else if(r&&D.test(t)){for(n=t.replace(D,"|").split("|"),p=0;n.length>p;p++)n[p]=s(n[p]);return n.join(",")}if(e=t.match(g)||[],p=e.length,u>p--)for(;u>++p;)e[p]=i?e[0|(p-1)/2]:a[p];return o+e.join(h)+l}:function(t){return t}},ue=function(t){return t=t.split(","),function(e,i,r,s,n,a,o){var l,h=(i+"").split(" ");for(o={},l=0;4>l;l++)o[t[l]]=h[l]=h[l]||h[(l-1)/2>>0];return s.parse(e,o,n,a)}},_e=(F._setPluginRatio=function(t){this.plugin.setRatio(t);for(var e,i,r,s,n=this.data,a=n.proxy,o=n.firstMPT,l=1e-6;o;)e=a[o.v],o.r?e=e>0?0|e+.5:0|e-.5:l>e&&e>-l&&(e=0),o.t[o.p]=e,o=o._next;if(n.autoRotate&&(n.autoRotate.rotation=a.rotation),1===t)for(o=n.firstMPT;o;){if(i=o.t,i.type){if(1===i.type){for(s=i.xs0+i.s+i.xs1,r=1;i.l>r;r++)s+=i["xn"+r]+i["xs"+(r+1)];i.e=s}}else i.e=i.s+i.xs0;o=o._next}},function(t,e,i,r,s){this.t=t,this.p=e,this.v=i,this.r=s,r&&(r._prev=this,this._next=r)}),pe=(F._parseToProxy=function(t,e,i,r,s,n){var a,o,l,h,u,_=r,p={},f={},c=i._transform,d=N;for(i._transform=null,N=e,r=u=i.parse(t,e,r,s),N=d,n&&(i._transform=c,_&&(_._prev=null,_._prev&&(_._prev._next=null)));r&&r!==_;){if(1>=r.type&&(o=r.p,f[o]=r.s+r.c,p[o]=r.s,n||(h=new _e(r,"s",o,h,r.r),r.c=0),1===r.type))for(a=r.l;--a>0;)l="xn"+a,o=r.p+"_"+l,f[o]=r.data[l],p[o]=r[l],n||(h=new _e(r,l,o,h,r.rxp[l]));r=r._next}return{proxy:p,end:f,firstMPT:h,pt:u}},F.CSSPropTween=function(t,e,r,s,a,o,l,h,u,_,p){this.t=t,this.p=e,this.s=r,this.c=s,this.n=l||e,t instanceof pe||n.push(this.n),this.r=h,this.type=o||0,u&&(this.pr=u,i=!0),this.b=void 0===_?r:_,this.e=void 0===p?r+s:p,a&&(this._next=a,a._prev=this)}),fe=a.parseComplex=function(t,e,i,r,s,n,a,o,l,u){i=i||n||"",a=new pe(t,e,0,0,a,u?2:1,null,!1,o,i,r),r+="";var _,p,f,c,g,v,y,T,x,w,P,S,R=i.split(", ").join(",").split(" "),k=r.split(", ").join(",").split(" "),C=R.length,A=h!==!1;for((-1!==r.indexOf(",")||-1!==i.indexOf(","))&&(R=R.join(" ").replace(D,", ").split(" "),k=k.join(" ").replace(D,", ").split(" "),C=R.length),C!==k.length&&(R=(n||"").split(" "),C=R.length),a.plugin=l,a.setRatio=u,_=0;C>_;_++)if(c=R[_],g=k[_],T=parseFloat(c),T||0===T)a.appendXtra("",T,ie(g,T),g.replace(m,""),A&&-1!==g.indexOf("px"),!0);else if(s&&("#"===c.charAt(0)||ne[c]||b.test(c)))S=","===g.charAt(g.length-1)?"),":")",c=oe(c),g=oe(g),x=c.length+g.length>6,x&&!z&&0===g[3]?(a["xs"+a.l]+=a.l?" transparent":"transparent",a.e=a.e.split(k[_]).join("transparent")):(z||(x=!1),a.appendXtra(x?"rgba(":"rgb(",c[0],g[0]-c[0],",",!0,!0).appendXtra("",c[1],g[1]-c[1],",",!0).appendXtra("",c[2],g[2]-c[2],x?",":S,!0),x&&(c=4>c.length?1:c[3],a.appendXtra("",c,(4>g.length?1:g[3])-c,S,!1)));else if(v=c.match(d)){if(y=g.match(m),!y||y.length!==v.length)return a;for(f=0,p=0;v.length>p;p++)P=v[p],w=c.indexOf(P,f),a.appendXtra(c.substr(f,w-f),Number(P),ie(y[p],P),"",A&&"px"===c.substr(w+P.length,2),0===p),f=w+P.length;a["xs"+a.l]+=c.substr(f)}else a["xs"+a.l]+=a.l?" "+c:c;if(-1!==r.indexOf("=")&&a.data){for(S=a.xs0+a.data.s,_=1;a.l>_;_++)S+=a["xs"+_]+a.data["xn"+_];a.e=S+a["xs"+_]}return a.l||(a.type=-1,a.xs0=a.e),a.xfirst||a},ce=9;for(l=pe.prototype,l.l=l.pr=0;--ce>0;)l["xn"+ce]=0,l["xs"+ce]="";l.xs0="",l._next=l._prev=l.xfirst=l.data=l.plugin=l.setRatio=l.rxp=null,l.appendXtra=function(t,e,i,r,s,n){var a=this,o=a.l;return a["xs"+o]+=n&&o?" "+t:t||"",i||0===o||a.plugin?(a.l++,a.type=a.setRatio?2:1,a["xs"+a.l]=r||"",o>0?(a.data["xn"+o]=e+i,a.rxp["xn"+o]=s,a["xn"+o]=e,a.plugin||(a.xfirst=new pe(a,"xn"+o,e,i,a.xfirst||a,0,a.n,s,a.pr),a.xfirst.xs0=0),a):(a.data={s:e+i},a.rxp={},a.s=e,a.c=i,a.r=s,a)):(a["xs"+o]+=e+(r||""),a)};var de=function(t,e){e=e||{},this.p=e.prefix?V(t)||t:t,o[t]=o[this.p]=this,this.format=e.formatter||he(e.defaultValue,e.color,e.collapsible,e.multi),e.parser&&(this.parse=e.parser),this.clrs=e.color,this.multi=e.multi,this.keyword=e.keyword,this.dflt=e.defaultValue,this.pr=e.priority||0},me=F._registerComplexSpecialProp=function(t,e,i){"object"!=typeof e&&(e={parser:i});var r,s,n=t.split(","),a=e.defaultValue;for(i=i||[a],r=0;n.length>r;r++)e.prefix=0===r&&e.prefix,e.defaultValue=i[r]||a,s=new de(n[r],e)},ge=function(t){if(!o[t]){var e=t.charAt(0).toUpperCase()+t.substr(1)+"Plugin";me(t,{parser:function(t,i,r,s,n,a,l){var h=(window.GreenSockGlobals||window).com.greensock.plugins[e];return h?(h._cssRegister(),o[r].parse(t,i,r,s,n,a,l)):(B("Error: "+e+" js file not loaded."),n)}})}};l=de.prototype,l.parseComplex=function(t,e,i,r,s,n){var a,o,l,h,u,_,p=this.keyword;if(this.multi&&(D.test(i)||D.test(e)?(o=e.replace(D,"|").split("|"),l=i.replace(D,"|").split("|")):p&&(o=[e],l=[i])),l){for(h=l.length>o.length?l.length:o.length,a=0;h>a;a++)e=o[a]=o[a]||this.dflt,i=l[a]=l[a]||this.dflt,p&&(u=e.indexOf(p),_=i.indexOf(p),u!==_&&(i=-1===_?l:o,i[a]+=" "+p));e=o.join(", "),i=l.join(", ")}return fe(t,this.p,e,i,this.clrs,this.dflt,r,this.pr,s,n)},l.parse=function(t,e,i,r,n,a){return this.parseComplex(t.style,this.format(H(t,this.p,s,!1,this.dflt)),this.format(e),n,a)},a.registerSpecialProp=function(t,e,i){me(t,{parser:function(t,r,s,n,a,o){var l=new pe(t,s,0,0,a,2,s,!1,i);return l.plugin=o,l.setRatio=e(t,r,n._tween,s),l},priority:i})};var ve="scaleX,scaleY,scaleZ,x,y,z,skewX,rotation,rotationX,rotationY,perspective".split(","),ye=V("transform"),Te=j+"transform",xe=V("transformOrigin"),we=null!==V("perspective"),be=function(t,e,i,r){if(t._gsTransform&&i&&!r)return t._gsTransform;var s,n,o,l,h,u,_,p,f,c,d,m,g,v=i?t._gsTransform||{skewY:0}:{skewY:0},y=0>v.scaleX,T=2e-5,x=1e5,w=179.99,b=w*M,P=we?parseFloat(H(t,xe,e,!1,"0 0 0").split(" ")[2])||v.zOrigin||0:0;for(ye?s=H(t,Te,e,!0):t.currentStyle&&(s=t.currentStyle.filter.match(A),s=s&&4===s.length?[s[0].substr(4),Number(s[2].substr(4)),Number(s[1].substr(4)),s[3].substr(4),v.x||0,v.y||0].join(","):""),n=(s||"").match(/(?:\-|\b)[\d\-\.e]+\b/gi)||[],o=n.length;--o>-1;)l=Number(n[o]),n[o]=(h=l-(l|=0))?(0|h*x+(0>h?-.5:.5))/x+l:l;if(16===n.length){var S=n[8],R=n[9],k=n[10],C=n[12],O=n[13],D=n[14];if(v.zOrigin&&(D=-v.zOrigin,C=S*D-n[12],O=R*D-n[13],D=k*D+v.zOrigin-n[14]),!i||r||null==v.rotationX){var N,X,I,E,F,Y,z,U=n[0],B=n[1],j=n[2],W=n[3],V=n[4],q=n[5],Q=n[6],Z=n[7],$=n[11],G=Math.atan2(Q,k),K=-b>G||G>b;v.rotationX=G*L,G&&(E=Math.cos(-G),F=Math.sin(-G),N=V*E+S*F,X=q*E+R*F,I=Q*E+k*F,S=V*-F+S*E,R=q*-F+R*E,k=Q*-F+k*E,$=Z*-F+$*E,V=N,q=X,Q=I),G=Math.atan2(S,U),v.rotationY=G*L,G&&(Y=-b>G||G>b,E=Math.cos(-G),F=Math.sin(-G),N=U*E-S*F,X=B*E-R*F,I=j*E-k*F,R=B*F+R*E,k=j*F+k*E,$=W*F+$*E,U=N,B=X,j=I),G=Math.atan2(B,q),v.rotation=G*L,G&&(z=-b>G||G>b,E=Math.cos(-G),F=Math.sin(-G),U=U*E+V*F,X=B*E+q*F,q=B*-F+q*E,Q=j*-F+Q*E,B=X),z&&K?v.rotation=v.rotationX=0:z&&Y?v.rotation=v.rotationY=0:Y&&K&&(v.rotationY=v.rotationX=0),v.scaleX=(0|Math.sqrt(U*U+B*B)*x+.5)/x,v.scaleY=(0|Math.sqrt(q*q+R*R)*x+.5)/x,v.scaleZ=(0|Math.sqrt(Q*Q+k*k)*x+.5)/x,v.skewX=0,v.perspective=$?1/(0>$?-$:$):0,v.x=C,v.y=O,v.z=D}}else if(!(we&&!r&&n.length&&v.x===n[4]&&v.y===n[5]&&(v.rotationX||v.rotationY)||void 0!==v.x&&"none"===H(t,"display",e))){var J=n.length>=6,te=J?n[0]:1,ee=n[1]||0,ie=n[2]||0,re=J?n[3]:1;v.x=n[4]||0,v.y=n[5]||0,u=Math.sqrt(te*te+ee*ee),_=Math.sqrt(re*re+ie*ie),p=te||ee?Math.atan2(ee,te)*L:v.rotation||0,f=ie||re?Math.atan2(ie,re)*L+p:v.skewX||0,c=u-Math.abs(v.scaleX||0),d=_-Math.abs(v.scaleY||0),Math.abs(f)>90&&270>Math.abs(f)&&(y?(u*=-1,f+=0>=p?180:-180,p+=0>=p?180:-180):(_*=-1,f+=0>=f?180:-180)),m=(p-v.rotation)%180,g=(f-v.skewX)%180,(void 0===v.skewX||c>T||-T>c||d>T||-T>d||m>-w&&w>m&&false|m*x||g>-w&&w>g&&false|g*x)&&(v.scaleX=u,v.scaleY=_,v.rotation=p,v.skewX=f),we&&(v.rotationX=v.rotationY=v.z=0,v.perspective=parseFloat(a.defaultTransformPerspective)||0,v.scaleZ=1)}v.zOrigin=P;for(o in v)T>v[o]&&v[o]>-T&&(v[o]=0);return i&&(t._gsTransform=v),v},Pe=function(t){var e,i,r=this.data,s=-r.rotation*M,n=s+r.skewX*M,a=1e5,o=(0|Math.cos(s)*r.scaleX*a)/a,l=(0|Math.sin(s)*r.scaleX*a)/a,h=(0|Math.sin(n)*-r.scaleY*a)/a,u=(0|Math.cos(n)*r.scaleY*a)/a,_=this.t.style,p=this.t.currentStyle;if(p){i=l,l=-h,h=-i,e=p.filter,_.filter="";var f,d,m=this.t.offsetWidth,g=this.t.offsetHeight,v="absolute"!==p.position,x="progid:DXImageTransform.Microsoft.Matrix(M11="+o+", M12="+l+", M21="+h+", M22="+u,w=r.x,b=r.y;if(null!=r.ox&&(f=(r.oxp?.01*m*r.ox:r.ox)-m/2,d=(r.oyp?.01*g*r.oy:r.oy)-g/2,w+=f-(f*o+d*l),b+=d-(f*h+d*u)),v?(f=m/2,d=g/2,x+=", Dx="+(f-(f*o+d*l)+w)+", Dy="+(d-(f*h+d*u)+b)+")"):x+=", sizingMethod='auto expand')",_.filter=-1!==e.indexOf("DXImageTransform.Microsoft.Matrix(")?e.replace(O,x):x+" "+e,(0===t||1===t)&&1===o&&0===l&&0===h&&1===u&&(v&&-1===x.indexOf("Dx=0, Dy=0")||T.test(e)&&100!==parseFloat(RegExp.$1)||-1===e.indexOf("gradient("&&e.indexOf("Alpha"))&&_.removeAttribute("filter")),!v){var P,S,R,k=8>c?1:-1;for(f=r.ieOffsetX||0,d=r.ieOffsetY||0,r.ieOffsetX=Math.round((m-((0>o?-o:o)*m+(0>l?-l:l)*g))/2+w),r.ieOffsetY=Math.round((g-((0>u?-u:u)*g+(0>h?-h:h)*m))/2+b),ce=0;4>ce;ce++)S=J[ce],P=p[S],i=-1!==P.indexOf("px")?parseFloat(P):Q(this.t,S,parseFloat(P),P.replace(y,""))||0,R=i!==r[S]?2>ce?-r.ieOffsetX:-r.ieOffsetY:2>ce?f-r.ieOffsetX:d-r.ieOffsetY,_[S]=(r[S]=Math.round(i-R*(0===ce||2===ce?1:k)))+"px"}}},Se=function(){var t,e,i,r,s,n,a,o,l,h,u,_,f,c,d,m,g,v,y,T,x,w,b,P=this.data,S=this.t.style,R=P.rotation*M,k=P.scaleX,C=P.scaleY,A=P.scaleZ,O=P.perspective;if(p){var D=1e-4;D>k&&k>-D&&(k=A=2e-5),D>C&&C>-D&&(C=A=2e-5),!O||P.z||P.rotationX||P.rotationY||(O=0)}if(R||P.skewX)v=Math.cos(R),y=Math.sin(R),t=v,s=y,P.skewX&&(R-=P.skewX*M,v=Math.cos(R),y=Math.sin(R)),e=-y,n=v;else{if(!(P.rotationY||P.rotationX||1!==A||O))return S[ye]="translate3d("+P.x+"px,"+P.y+"px,"+P.z+"px)"+(1!==k||1!==C?" scale("+k+","+C+")":""),void 0;t=n=1,e=s=0}u=1,i=r=a=o=l=h=_=f=c=0,d=O?-1/O:0,m=P.zOrigin,g=1e5,R=P.rotationY*M,R&&(v=Math.cos(R),y=Math.sin(R),l=u*-y,f=d*-y,i=t*y,a=s*y,u*=v,d*=v,t*=v,s*=v),R=P.rotationX*M,R&&(v=Math.cos(R),y=Math.sin(R),T=e*v+i*y,x=n*v+a*y,w=h*v+u*y,b=c*v+d*y,i=e*-y+i*v,a=n*-y+a*v,u=h*-y+u*v,d=c*-y+d*v,e=T,n=x,h=w,c=b),1!==A&&(i*=A,a*=A,u*=A,d*=A),1!==C&&(e*=C,n*=C,h*=C,c*=C),1!==k&&(t*=k,s*=k,l*=k,f*=k),m&&(_-=m,r=i*_,o=a*_,_=u*_+m),r=(T=(r+=P.x)-(r|=0))?(0|T*g+(0>T?-.5:.5))/g+r:r,o=(T=(o+=P.y)-(o|=0))?(0|T*g+(0>T?-.5:.5))/g+o:o,_=(T=(_+=P.z)-(_|=0))?(0|T*g+(0>T?-.5:.5))/g+_:_,S[ye]="matrix3d("+[(0|t*g)/g,(0|s*g)/g,(0|l*g)/g,(0|f*g)/g,(0|e*g)/g,(0|n*g)/g,(0|h*g)/g,(0|c*g)/g,(0|i*g)/g,(0|a*g)/g,(0|u*g)/g,(0|d*g)/g,r,o,_,O?1+-_/O:1].join(",")+")"},Re=function(t){var e,i,r,s,n,a=this.data,o=this.t,l=o.style;return a.rotationX||a.rotationY||a.z||a.force3D?(this.setRatio=Se,Se.call(this,t),void 0):(a.rotation||a.skewX?(e=a.rotation*M,i=e-a.skewX*M,r=1e5,s=a.scaleX*r,n=a.scaleY*r,l[ye]="matrix("+(0|Math.cos(e)*s)/r+","+(0|Math.sin(e)*s)/r+","+(0|Math.sin(i)*-n)/r+","+(0|Math.cos(i)*n)/r+","+a.x+","+a.y+")"):l[ye]="matrix("+a.scaleX+",0,0,"+a.scaleY+","+a.x+","+a.y+")",void 0)};me("transform,scale,scaleX,scaleY,scaleZ,x,y,z,rotation,rotationX,rotationY,rotationZ,skewX,skewY,shortRotation,shortRotationX,shortRotationY,shortRotationZ,transformOrigin,transformPerspective,directionalRotation,parseTransform,force3D",{parser:function(t,e,i,r,n,a,o){if(r._transform)return n;var l,h,u,_,p,f,c,d=r._transform=be(t,s,!0,o.parseTransform),m=t.style,g=1e-6,v=ve.length,y=o,T={};if("string"==typeof y.transform&&ye)u=m.cssText,m[ye]=y.transform,m.display="block",l=be(t,null,!1),m.cssText=u;else if("object"==typeof y){if(l={scaleX:re(null!=y.scaleX?y.scaleX:y.scale,d.scaleX),scaleY:re(null!=y.scaleY?y.scaleY:y.scale,d.scaleY),scaleZ:re(y.scaleZ,d.scaleZ),x:re(y.x,d.x),y:re(y.y,d.y),z:re(y.z,d.z),perspective:re(y.transformPerspective,d.perspective)},c=y.directionalRotation,null!=c)if("object"==typeof c)for(u in c)y[u]=c[u];else y.rotation=c;l.rotation=se("rotation"in y?y.rotation:"shortRotation"in y?y.shortRotation+"_short":"rotationZ"in y?y.rotationZ:d.rotation,d.rotation,"rotation",T),we&&(l.rotationX=se("rotationX"in y?y.rotationX:"shortRotationX"in y?y.shortRotationX+"_short":d.rotationX||0,d.rotationX,"rotationX",T),l.rotationY=se("rotationY"in y?y.rotationY:"shortRotationY"in y?y.shortRotationY+"_short":d.rotationY||0,d.rotationY,"rotationY",T)),l.skewX=null==y.skewX?d.skewX:se(y.skewX,d.skewX),l.skewY=null==y.skewY?d.skewY:se(y.skewY,d.skewY),(h=l.skewY-d.skewY)&&(l.skewX+=h,l.rotation+=h)}for(we&&null!=y.force3D&&(d.force3D=y.force3D,f=!0),p=d.force3D||d.z||d.rotationX||d.rotationY||l.z||l.rotationX||l.rotationY||l.perspective,p||null==y.scale||(l.scaleZ=1);--v>-1;)i=ve[v],_=l[i]-d[i],(_>g||-g>_||null!=N[i])&&(f=!0,n=new pe(d,i,d[i],_,n),i in T&&(n.e=T[i]),n.xs0=0,n.plugin=a,r._overwriteProps.push(n.n));return _=y.transformOrigin,(_||we&&p&&d.zOrigin)&&(ye?(f=!0,i=xe,_=(_||H(t,i,s,!1,"50% 50%"))+"",n=new pe(m,i,0,0,n,-1,"transformOrigin"),n.b=m[i],n.plugin=a,we?(u=d.zOrigin,_=_.split(" "),d.zOrigin=(_.length>2&&(0===u||"0px"!==_[2])?parseFloat(_[2]):u)||0,n.xs0=n.e=m[i]=_[0]+" "+(_[1]||"50%")+" 0px",n=new pe(d,"zOrigin",0,0,n,-1,n.n),n.b=u,n.xs0=n.e=d.zOrigin):n.xs0=n.e=m[i]=_):ee(_+"",d)),f&&(r._transformType=p||3===this._transformType?3:2),n},prefix:!0}),me("boxShadow",{defaultValue:"0px 0px 0px 0px #999",prefix:!0,color:!0,multi:!0,keyword:"inset"}),me("borderRadius",{defaultValue:"0px",parser:function(t,e,i,n,a){e=this.format(e);var o,l,h,u,_,p,f,c,d,m,g,v,y,T,x,w,b=["borderTopLeftRadius","borderTopRightRadius","borderBottomRightRadius","borderBottomLeftRadius"],P=t.style;for(d=parseFloat(t.offsetWidth),m=parseFloat(t.offsetHeight),o=e.split(" "),l=0;b.length>l;l++)this.p.indexOf("border")&&(b[l]=V(b[l])),_=u=H(t,b[l],s,!1,"0px"),-1!==_.indexOf(" ")&&(u=_.split(" "),_=u[0],u=u[1]),p=h=o[l],f=parseFloat(_),v=_.substr((f+"").length),y="="===p.charAt(1),y?(c=parseInt(p.charAt(0)+"1",10),p=p.substr(2),c*=parseFloat(p),g=p.substr((c+"").length-(0>c?1:0))||""):(c=parseFloat(p),g=p.substr((c+"").length)),""===g&&(g=r[i]||v),g!==v&&(T=Q(t,"borderLeft",f,v),x=Q(t,"borderTop",f,v),"%"===g?(_=100*(T/d)+"%",u=100*(x/m)+"%"):"em"===g?(w=Q(t,"borderLeft",1,"em"),_=T/w+"em",u=x/w+"em"):(_=T+"px",u=x+"px"),y&&(p=parseFloat(_)+c+g,h=parseFloat(u)+c+g)),a=fe(P,b[l],_+" "+u,p+" "+h,!1,"0px",a);return a},prefix:!0,formatter:he("0px 0px 0px 0px",!1,!0)}),me("backgroundPosition",{defaultValue:"0 0",parser:function(t,e,i,r,n,a){var o,l,h,u,_,p,f="background-position",d=s||q(t,null),m=this.format((d?c?d.getPropertyValue(f+"-x")+" "+d.getPropertyValue(f+"-y"):d.getPropertyValue(f):t.currentStyle.backgroundPositionX+" "+t.currentStyle.backgroundPositionY)||"0 0"),g=this.format(e);if(-1!==m.indexOf("%")!=(-1!==g.indexOf("%"))&&(p=H(t,"backgroundImage").replace(R,""),p&&"none"!==p)){for(o=m.split(" "),l=g.split(" "),E.setAttribute("src",p),h=2;--h>-1;)m=o[h],u=-1!==m.indexOf("%"),u!==(-1!==l[h].indexOf("%"))&&(_=0===h?t.offsetWidth-E.width:t.offsetHeight-E.height,o[h]=u?parseFloat(m)/100*_+"px":100*(parseFloat(m)/_)+"%");m=o.join(" ")}return this.parseComplex(t.style,m,g,n,a)},formatter:ee}),me("backgroundSize",{defaultValue:"0 0",formatter:ee}),me("perspective",{defaultValue:"0px",prefix:!0}),me("perspectiveOrigin",{defaultValue:"50% 50%",prefix:!0}),me("transformStyle",{prefix:!0}),me("backfaceVisibility",{prefix:!0}),me("userSelect",{prefix:!0}),me("margin",{parser:ue("marginTop,marginRight,marginBottom,marginLeft")}),me("padding",{parser:ue("paddingTop,paddingRight,paddingBottom,paddingLeft")}),me("clip",{defaultValue:"rect(0px,0px,0px,0px)",parser:function(t,e,i,r,n,a){var o,l,h;return 9>c?(l=t.currentStyle,h=8>c?" ":",",o="rect("+l.clipTop+h+l.clipRight+h+l.clipBottom+h+l.clipLeft+")",e=this.format(e).split(",").join(h)):(o=this.format(H(t,this.p,s,!1,this.dflt)),e=this.format(e)),this.parseComplex(t.style,o,e,n,a)}}),me("textShadow",{defaultValue:"0px 0px 0px #999",color:!0,multi:!0}),me("autoRound,strictUnits",{parser:function(t,e,i,r,s){return s}}),me("border",{defaultValue:"0px solid #000",parser:function(t,e,i,r,n,a){return this.parseComplex(t.style,this.format(H(t,"borderTopWidth",s,!1,"0px")+" "+H(t,"borderTopStyle",s,!1,"solid")+" "+H(t,"borderTopColor",s,!1,"#000")),this.format(e),n,a)},color:!0,formatter:function(t){var e=t.split(" ");return e[0]+" "+(e[1]||"solid")+" "+(t.match(le)||["#000"])[0]}}),me("borderWidth",{parser:ue("borderTopWidth,borderRightWidth,borderBottomWidth,borderLeftWidth")}),me("float,cssFloat,styleFloat",{parser:function(t,e,i,r,s){var n=t.style,a="cssFloat"in n?"cssFloat":"styleFloat";return new pe(n,a,0,0,s,-1,i,!1,0,n[a],e)}});var ke=function(t){var e,i=this.t,r=i.filter||H(this.data,"filter"),s=0|this.s+this.c*t;100===s&&(-1===r.indexOf("atrix(")&&-1===r.indexOf("radient(")&&-1===r.indexOf("oader(")?(i.removeAttribute("filter"),e=!H(this.data,"filter")):(i.filter=r.replace(w,""),e=!0)),e||(this.xn1&&(i.filter=r=r||"alpha(opacity="+s+")"),-1===r.indexOf("opacity")?0===s&&this.xn1||(i.filter=r+" alpha(opacity="+s+")"):i.filter=r.replace(T,"opacity="+s))};me("opacity,alpha,autoAlpha",{defaultValue:"1",parser:function(t,e,i,r,n,a){var o=parseFloat(H(t,"opacity",s,!1,"1")),l=t.style,h="autoAlpha"===i;return"string"==typeof e&&"="===e.charAt(1)&&(e=("-"===e.charAt(0)?-1:1)*parseFloat(e.substr(2))+o),h&&1===o&&"hidden"===H(t,"visibility",s)&&0!==e&&(o=0),z?n=new pe(l,"opacity",o,e-o,n):(n=new pe(l,"opacity",100*o,100*(e-o),n),n.xn1=h?1:0,l.zoom=1,n.type=2,n.b="alpha(opacity="+n.s+")",n.e="alpha(opacity="+(n.s+n.c)+")",n.data=t,n.plugin=a,n.setRatio=ke),h&&(n=new pe(l,"visibility",0,0,n,-1,null,!1,0,0!==o?"inherit":"hidden",0===e?"hidden":"inherit"),n.xs0="inherit",r._overwriteProps.push(n.n),r._overwriteProps.push(i)),n}});var Ce=function(t,e){e&&(t.removeProperty?t.removeProperty(e.replace(P,"-$1").toLowerCase()):t.removeAttribute(e))},Ae=function(t){if(this.t._gsClassPT=this,1===t||0===t){this.t.className=0===t?this.b:this.e;for(var e=this.data,i=this.t.style;e;)e.v?i[e.p]=e.v:Ce(i,e.p),e=e._next;1===t&&this.t._gsClassPT===this&&(this.t._gsClassPT=null)}else this.t.className!==this.e&&(this.t.className=this.e)};me("className",{parser:function(t,e,r,n,a,o,l){var h,u,_,p,f,c=t.className,d=t.style.cssText;if(a=n._classNamePT=new pe(t,r,0,0,a,2),a.setRatio=Ae,a.pr=-11,i=!0,a.b=c,u=$(t,s),_=t._gsClassPT){for(p={},f=_.data;f;)p[f.p]=1,f=f._next;_.setRatio(1)}return t._gsClassPT=a,a.e="="!==e.charAt(1)?e:c.replace(RegExp("\\s*\\b"+e.substr(2)+"\\b"),"")+("+"===e.charAt(0)?" "+e.substr(2):""),n._tween._duration&&(t.className=a.e,h=G(t,u,$(t),l,p),t.className=c,a.data=h.firstMPT,t.style.cssText=d,a=a.xfirst=n.parse(t,h.difs,a,o)),a}});var Oe=function(t){if((1===t||0===t)&&this.data._totalTime===this.data._totalDuration&&"isFromStart"!==this.data.data){var e,i,r,s,n=this.t.style,a=o.transform.parse;if("all"===this.e)n.cssText="",s=!0;else for(e=this.e.split(","),r=e.length;--r>-1;)i=e[r],o[i]&&(o[i].parse===a?s=!0:i="transformOrigin"===i?xe:o[i].p),Ce(n,i);s&&(Ce(n,ye),this.t._gsTransform&&delete this.t._gsTransform)}};for(me("clearProps",{parser:function(t,e,r,s,n){return n=new pe(t,r,0,0,n,2),n.setRatio=Oe,n.e=e,n.pr=-10,n.data=s._tween,i=!0,n}}),l="bezier,throwProps,physicsProps,physics2D".split(","),ce=l.length;ce--;)ge(l[ce]);l=a.prototype,l._firstPT=null,l._onInitTween=function(t,e,o){if(!t.nodeType)return!1;this._target=t,this._tween=o,this._vars=e,h=e.autoRound,i=!1,r=e.suffixMap||a.suffixMap,s=q(t,""),n=this._overwriteProps;var l,p,c,d,m,g,v,y,T,w=t.style;if(u&&""===w.zIndex&&(l=H(t,"zIndex",s),("auto"===l||""===l)&&(w.zIndex=0)),"string"==typeof e&&(d=w.cssText,l=$(t,s),w.cssText=d+";"+e,l=G(t,l,$(t)).difs,!z&&x.test(e)&&(l.opacity=parseFloat(RegExp.$1)),e=l,w.cssText=d),this._firstPT=p=this.parse(t,e,null),this._transformType){for(T=3===this._transformType,ye?_&&(u=!0,""===w.zIndex&&(v=H(t,"zIndex",s),("auto"===v||""===v)&&(w.zIndex=0)),f&&(w.WebkitBackfaceVisibility=this._vars.WebkitBackfaceVisibility||(T?"visible":"hidden"))):w.zoom=1,c=p;c&&c._next;)c=c._next;y=new pe(t,"transform",0,0,null,2),this._linkCSSP(y,null,c),y.setRatio=T&&we?Se:ye?Re:Pe,y.data=this._transform||be(t,s,!0),n.pop()}if(i){for(;p;){for(g=p._next,c=d;c&&c.pr>p.pr;)c=c._next;(p._prev=c?c._prev:m)?p._prev._next=p:d=p,(p._next=c)?c._prev=p:m=p,p=g}this._firstPT=d}return!0},l.parse=function(t,e,i,n){var a,l,u,_,p,f,c,d,m,g,v=t.style;for(a in e)f=e[a],l=o[a],l?i=l.parse(t,f,a,this,i,n,e):(p=H(t,a,s)+"",m="string"==typeof f,"color"===a||"fill"===a||"stroke"===a||-1!==a.indexOf("Color")||m&&b.test(f)?(m||(f=oe(f),f=(f.length>3?"rgba(":"rgb(")+f.join(",")+")"),i=fe(v,a,p,f,!0,"transparent",i,0,n)):!m||-1===f.indexOf(" ")&&-1===f.indexOf(",")?(u=parseFloat(p),c=u||0===u?p.substr((u+"").length):"",(""===p||"auto"===p)&&("width"===a||"height"===a?(u=te(t,a,s),c="px"):"left"===a||"top"===a?(u=Z(t,a,s),c="px"):(u="opacity"!==a?0:1,c="")),g=m&&"="===f.charAt(1),g?(_=parseInt(f.charAt(0)+"1",10),f=f.substr(2),_*=parseFloat(f),d=f.replace(y,"")):(_=parseFloat(f),d=m?f.substr((_+"").length)||"":""),""===d&&(d=a in r?r[a]:c),f=_||0===_?(g?_+u:_)+d:e[a],c!==d&&""!==d&&(_||0===_)&&(u||0===u)&&(u=Q(t,a,u,c),"%"===d?(u/=Q(t,a,100,"%")/100,e.strictUnits!==!0&&(p=u+"%")):"em"===d?u/=Q(t,a,1,"em"):(_=Q(t,a,_,d),d="px"),g&&(_||0===_)&&(f=_+u+d)),g&&(_+=u),!u&&0!==u||!_&&0!==_?void 0!==v[a]&&(f||"NaN"!=f+""&&null!=f)?(i=new pe(v,a,_||u||0,0,i,-1,a,!1,0,p,f),i.xs0="none"!==f||"display"!==a&&-1===a.indexOf("Style")?f:p):B("invalid "+a+" tween value: "+e[a]):(i=new pe(v,a,u,_-u,i,0,a,h!==!1&&("px"===d||"zIndex"===a),0,p,f),i.xs0=d)):i=fe(v,a,p,f,!0,null,i,0,n)),n&&i&&!i.plugin&&(i.plugin=n);return i},l.setRatio=function(t){var e,i,r,s=this._firstPT,n=1e-6;if(1!==t||this._tween._time!==this._tween._duration&&0!==this._tween._time)if(t||this._tween._time!==this._tween._duration&&0!==this._tween._time||this._tween._rawPrevTime===-1e-6)for(;s;){if(e=s.c*t+s.s,s.r?e=e>0?0|e+.5:0|e-.5:n>e&&e>-n&&(e=0),s.type)if(1===s.type)if(r=s.l,2===r)s.t[s.p]=s.xs0+e+s.xs1+s.xn1+s.xs2;else if(3===r)s.t[s.p]=s.xs0+e+s.xs1+s.xn1+s.xs2+s.xn2+s.xs3;else if(4===r)s.t[s.p]=s.xs0+e+s.xs1+s.xn1+s.xs2+s.xn2+s.xs3+s.xn3+s.xs4;else if(5===r)s.t[s.p]=s.xs0+e+s.xs1+s.xn1+s.xs2+s.xn2+s.xs3+s.xn3+s.xs4+s.xn4+s.xs5;else{for(i=s.xs0+e+s.xs1,r=1;s.l>r;r++)i+=s["xn"+r]+s["xs"+(r+1)];s.t[s.p]=i}else-1===s.type?s.t[s.p]=s.xs0:s.setRatio&&s.setRatio(t);else s.t[s.p]=e+s.xs0;s=s._next}else for(;s;)2!==s.type?s.t[s.p]=s.b:s.setRatio(t),s=s._next;else for(;s;)2!==s.type?s.t[s.p]=s.e:s.setRatio(t),s=s._next},l._enableTransforms=function(t){this._transformType=t||3===this._transformType?3:2,this._transform=this._transform||be(this._target,s,!0)},l._linkCSSP=function(t,e,i,r){return t&&(e&&(e._prev=t),t._next&&(t._next._prev=t._prev),t._prev?t._prev._next=t._next:this._firstPT===t&&(this._firstPT=t._next,r=!0),i?i._next=t:r||null!==this._firstPT||(this._firstPT=t),t._next=e,t._prev=i),t},l._kill=function(e){var i,r,s,n=e;if(e.autoAlpha||e.alpha){n={};for(r in e)n[r]=e[r];n.opacity=1,n.autoAlpha&&(n.visibility=1)}return e.className&&(i=this._classNamePT)&&(s=i.xfirst,s&&s._prev?this._linkCSSP(s._prev,i._next,s._prev._prev):s===this._firstPT&&(this._firstPT=i._next),i._next&&this._linkCSSP(i._next,i._next._next,s._prev),this._classNamePT=null),t.prototype._kill.call(this,n)};var De=function(t,e,i){var r,s,n,a;if(t.slice)for(s=t.length;--s>-1;)De(t[s],e,i);else for(r=t.childNodes,s=r.length;--s>-1;)n=r[s],a=n.type,n.style&&(e.push($(n)),i&&i.push(n)),1!==a&&9!==a&&11!==a||!n.childNodes.length||De(n,e,i)};return a.cascadeTo=function(t,i,r){var s,n,a,o=e.to(t,i,r),l=[o],h=[],u=[],_=[],p=e._internals.reservedProps;for(t=o._targets||o.target,De(t,h,_),o.render(i,!0),De(t,u),o.render(0,!0),o._enabled(!0),s=_.length;--s>-1;)if(n=G(_[s],h[s],u[s]),n.firstMPT){n=n.difs;for(a in r)p[a]&&(n[a]=r[a]);l.push(e.to(_[s],i,n))}return l},t.activate([a]),a},!0)}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: beta 0.6.1
 * DATE: 2014-01-20
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";window._gsDefine("plugins.CSSRulePlugin",["plugins.TweenPlugin","TweenLite","plugins.CSSPlugin"],function(t,e,i){var s=function(){t.call(this,"cssRule"),this._overwriteProps.length=0},r=window.document,n=i.prototype.setRatio,a=s.prototype=new i;return a._propName="cssRule",a.constructor=s,s.version="0.6.1",s.API=2,s.getRule=function(t){var e,i,s,n,a=r.all?"rules":"cssRules",o=r.styleSheets,l=o.length,h=":"===t.charAt(0);for(t=(h?"":",")+t.toLowerCase()+",",h&&(n=[]);--l>-1;){try{i=o[l][a]}catch(u){console.log(u);continue}for(e=i.length;--e>-1;)if(s=i[e],s.selectorText&&-1!==(","+s.selectorText.split("::").join(":").toLowerCase()+",").indexOf(t)){if(!h)return s.style;n.push(s.style)}}return n},a._onInitTween=function(t,e,s){if(void 0===t.cssText)return!1;var n=t._gsProxy=t._gsProxy||r.createElement("div");return this._ss=t,this._proxy=n.style,n.style.cssText=t.cssText,i.prototype._onInitTween.call(this,n,e,s),!0},a.setRatio=function(t){n.call(this,t),this._ss.cssText=this._proxy.cssText},t.activate([s]),s},!0)}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: beta 1.2.0
 * DATE: 2013-03-01
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 **/
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";var t=/(\d|\.)+/g,e={aqua:[0,255,255],lime:[0,255,0],silver:[192,192,192],black:[0,0,0],maroon:[128,0,0],teal:[0,128,128],blue:[0,0,255],navy:[0,0,128],white:[255,255,255],fuchsia:[255,0,255],olive:[128,128,0],yellow:[255,255,0],orange:[255,165,0],gray:[128,128,128],purple:[128,0,128],green:[0,128,0],red:[255,0,0],pink:[255,192,203],cyan:[0,255,255],transparent:[255,255,255,0]},i=function(t,e,i){return t=0>t?t+1:t>1?t-1:t,0|255*(1>6*t?e+6*(i-e)*t:.5>t?i:2>3*t?e+6*(i-e)*(2/3-t):e)+.5},s=function(s){if(""===s||null==s||"none"===s)return e.transparent;if(e[s])return e[s];if("number"==typeof s)return[s>>16,255&s>>8,255&s];if("#"===s.charAt(0))return 4===s.length&&(s="#"+s.charAt(1)+s.charAt(1)+s.charAt(2)+s.charAt(2)+s.charAt(3)+s.charAt(3)),s=parseInt(s.substr(1),16),[s>>16,255&s>>8,255&s];if("hsl"===s.substr(0,3)){s=s.match(t);var r=Number(s[0])%360/360,n=Number(s[1])/100,a=Number(s[2])/100,o=.5>=a?a*(n+1):a+n-a*n,h=2*a-o;return s.length>3&&(s[3]=Number(s[3])),s[0]=i(r+1/3,h,o),s[1]=i(r,h,o),s[2]=i(r-1/3,h,o),s}return s.match(t)||e.transparent};window._gsDefine.plugin({propName:"colorProps",priority:-1,API:2,init:function(t,e){this._target=t;var i,r,n,a;for(i in e)n=s(e[i]),this._firstPT=a={_next:this._firstPT,p:i,f:"function"==typeof t[i],n:i,r:!1},r=s(a.f?t[i.indexOf("set")||"function"!=typeof t["get"+i.substr(3)]?i:"get"+i.substr(3)]():t[i]),a.s=Number(r[0]),a.c=Number(n[0])-a.s,a.gs=Number(r[1]),a.gc=Number(n[1])-a.gs,a.bs=Number(r[2]),a.bc=Number(n[2])-a.bs,(a.rgba=r.length>3||n.length>3)&&(a.as=4>r.length?1:Number(r[3]),a.ac=(4>n.length?1:Number(n[3]))-a.as),a._next&&(a._next._prev=a);return!0},set:function(t){for(var e,i=this._firstPT;i;)e=(i.rgba?"rgba(":"rgb(")+(i.s+t*i.c>>0)+", "+(i.gs+t*i.gc>>0)+", "+(i.bs+t*i.bc>>0)+(i.rgba?", "+(i.as+t*i.ac):"")+")",i.f?this._target[i.p](e):this._target[i.p]=e,i=i._next}})}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: beta 0.2.0
 * DATE: 2013-05-07
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 **/
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";window._gsDefine.plugin({propName:"directionalRotation",API:2,version:"0.2.0",init:function(t,e){"object"!=typeof e&&(e={rotation:e}),this.finals={};var i,s,r,n,a,o,l=e.useRadians===!0?2*Math.PI:360,h=1e-6;for(i in e)"useRadians"!==i&&(o=(e[i]+"").split("_"),s=o[0],r=parseFloat("function"!=typeof t[i]?t[i]:t[i.indexOf("set")||"function"!=typeof t["get"+i.substr(3)]?i:"get"+i.substr(3)]()),n=this.finals[i]="string"==typeof s&&"="===s.charAt(1)?r+parseInt(s.charAt(0)+"1",10)*Number(s.substr(2)):Number(s)||0,a=n-r,o.length&&(s=o.join("_"),-1!==s.indexOf("short")&&(a%=l,a!==a%(l/2)&&(a=0>a?a+l:a-l)),-1!==s.indexOf("_cw")&&0>a?a=(a+9999999999*l)%l-(0|a/l)*l:-1!==s.indexOf("ccw")&&a>0&&(a=(a-9999999999*l)%l-(0|a/l)*l)),(a>h||-h>a)&&(this._addTween(t,i,r,r+a,i),this._overwriteProps.push(i)));return!0},set:function(t){var e;if(1!==t)this._super.setRatio.call(this,t);else for(e=this._firstPT;e;)e.f?e.t[e.p](this.finals[e.p]):e.t[e.p]=this.finals[e.p],e=e._next}})._autoCSS=!0}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: beta 0.1.5
 * DATE: 2013-08-29
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 **/
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";var t,e,i=/(\d|\.)+/g,r=["redMultiplier","greenMultiplier","blueMultiplier","alphaMultiplier","redOffset","greenOffset","blueOffset","alphaOffset"],s={aqua:[0,255,255],lime:[0,255,0],silver:[192,192,192],black:[0,0,0],maroon:[128,0,0],teal:[0,128,128],blue:[0,0,255],navy:[0,0,128],white:[255,255,255],fuchsia:[255,0,255],olive:[128,128,0],yellow:[255,255,0],orange:[255,165,0],gray:[128,128,128],purple:[128,0,128],green:[0,128,0],red:[255,0,0],pink:[255,192,203],cyan:[0,255,255],transparent:[255,255,255,0]},n=function(t){return""===t||null==t||"none"===t?s.transparent:s[t]?s[t]:"number"==typeof t?[t>>16,255&t>>8,255&t]:"#"===t.charAt(0)?(4===t.length&&(t="#"+t.charAt(1)+t.charAt(1)+t.charAt(2)+t.charAt(2)+t.charAt(3)+t.charAt(3)),t=parseInt(t.substr(1),16),[t>>16,255&t>>8,255&t]):t.match(i)||s.transparent},a=function(e,i,s){if(!t&&(t=window.ColorFilter||window.createjs.ColorFilter,!t))throw"EaselPlugin error: The EaselJS ColorFilter JavaScript file wasn't loaded.";for(var a,o,l,h,u,_=e.filters||[],p=_.length;--p>-1;)if(_[p]instanceof t){o=_[p];break}if(o||(o=new t,_.push(o),e.filters=_),l=o.clone(),null!=i.tint)a=n(i.tint),h=null!=i.tintAmount?Number(i.tintAmount):1,l.redOffset=Number(a[0])*h,l.greenOffset=Number(a[1])*h,l.blueOffset=Number(a[2])*h,l.redMultiplier=l.greenMultiplier=l.blueMultiplier=1-h;else for(u in i)"exposure"!==u&&"brightness"!==u&&(l[u]=Number(i[u]));for(null!=i.exposure?(l.redOffset=l.greenOffset=l.blueOffset=255*(Number(i.exposure)-1),l.redMultiplier=l.greenMultiplier=l.blueMultiplier=1):null!=i.brightness&&(h=Number(i.brightness)-1,l.redOffset=l.greenOffset=l.blueOffset=h>0?255*h:0,l.redMultiplier=l.greenMultiplier=l.blueMultiplier=1-Math.abs(h)),p=8;--p>-1;)u=r[p],o[u]!==l[u]&&s._addTween(o,u,o[u],l[u],"easel_colorFilter");if(s._overwriteProps.push("easel_colorFilter"),!e.cacheID)throw"EaselPlugin warning: for filters to display in EaselJS, you must call the object's cache() method first. "+e},o=[1,0,0,0,0,0,1,0,0,0,0,0,1,0,0,0,0,0,1,0],l=.212671,h=.71516,u=.072169,_=function(t,e){if(!(t instanceof Array&&e instanceof Array))return e;var i,r,s=[],n=0,a=0;for(i=0;4>i;i++){for(r=0;5>r;r++)a=4===r?t[n+4]:0,s[n+r]=t[n]*e[r]+t[n+1]*e[r+5]+t[n+2]*e[r+10]+t[n+3]*e[r+15]+a;n+=5}return s},p=function(t,e){if(isNaN(e))return t;var i=1-e,r=i*l,s=i*h,n=i*u;return _([r+e,s,n,0,0,r,s+e,n,0,0,r,s,n+e,0,0,0,0,0,1,0],t)},f=function(t,e,i){isNaN(i)&&(i=1);var r=n(e),s=r[0]/255,a=r[1]/255,o=r[2]/255,p=1-i;return _([p+i*s*l,i*s*h,i*s*u,0,0,i*a*l,p+i*a*h,i*a*u,0,0,i*o*l,i*o*h,p+i*o*u,0,0,0,0,0,1,0],t)},c=function(t,e){if(isNaN(e))return t;e*=Math.PI/180;var i=Math.cos(e),r=Math.sin(e);return _([l+i*(1-l)+r*-l,h+i*-h+r*-h,u+i*-u+r*(1-u),0,0,l+i*-l+.143*r,h+i*(1-h)+.14*r,u+i*-u+r*-.283,0,0,l+i*-l+r*-(1-l),h+i*-h+r*h,u+i*(1-u)+r*u,0,0,0,0,0,1,0,0,0,0,0,1],t)},d=function(t,e){return isNaN(e)?t:(e+=.01,_([e,0,0,0,128*(1-e),0,e,0,0,128*(1-e),0,0,e,0,128*(1-e),0,0,0,1,0],t))},m=function(t,i,r){if(!e&&(e=window.ColorMatrixFilter||window.createjs.ColorMatrixFilter,!e))throw"EaselPlugin error: The EaselJS ColorMatrixFilter JavaScript file wasn't loaded.";for(var s,n,a,l=t.filters||[],h=l.length;--h>-1;)if(l[h]instanceof e){a=l[h];break}for(a||(a=new e(o.slice()),l.push(a),t.filters=l),n=a.matrix,s=o.slice(),null!=i.colorize&&(s=f(s,i.colorize,Number(i.colorizeAmount))),null!=i.contrast&&(s=d(s,Number(i.contrast))),null!=i.hue&&(s=c(s,Number(i.hue))),null!=i.saturation&&(s=p(s,Number(i.saturation))),h=s.length;--h>-1;)s[h]!==n[h]&&r._addTween(n,h,n[h],s[h],"easel_colorMatrixFilter");if(r._overwriteProps.push("easel_colorMatrixFilter"),!t.cacheID)throw"EaselPlugin warning: for filters to display in EaselJS, you must call the object's cache() method first. "+t;r._matrix=n};window._gsDefine.plugin({propName:"easel",priority:-1,API:2,init:function(t,e){this._target=t;var i,r,s,n;for(i in e)"colorFilter"===i||"tint"===i||"tintAmount"===i||"exposure"===i||"brightness"===i?s||(a(t,e.colorFilter||e,this),s=!0):"saturation"===i||"contrast"===i||"hue"===i||"colorize"===i||"colorizeAmount"===i?n||(m(t,e.colorMatrixFilter||e,this),n=!0):"frame"===i?(this._firstPT=r={_next:this._firstPT,t:t,p:"gotoAndStop",s:t.currentFrame,f:!0,n:"frame",pr:0,type:0,r:!0},r.c="number"==typeof e[i]?e[i]-r.s:"string"==typeof e[i]?parseFloat(e[i].split("=").join("")):0,r._next&&(r._next._prev=r)):null!=t[i]&&(this._firstPT=r={_next:this._firstPT,t:t,p:i,f:"function"==typeof t[i],n:i,pr:0,type:0},r.s=r.f?t[i.indexOf("set")||"function"!=typeof t["get"+i.substr(3)]?i:"get"+i.substr(3)]():parseFloat(t[i]),r.c="number"==typeof e[i]?e[i]-r.s:"string"==typeof e[i]?parseFloat(e[i].split("=").join("")):0,r._next&&(r._next._prev=r));return!0},set:function(t){for(var e,i=this._firstPT,r=1e-6;i;)e=i.c*t+i.s,i.r?e=e+(e>0?.5:-.5)>>0:r>e&&e>-r&&(e=0),i.f?i.t[i.p](e):i.t[i.p]=e,i=i._next;this._target.cacheID&&this._target.updateCache()}})}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: 0.1.0
 * DATE: 2014-02-20
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";window._gsDefine.plugin({propName:"endArray",API:2,version:"0.1.0",init:function(t,e){var i,r,s=e.length,n=this.a=[];if(this.target=t,this._round=!1,!s)return!1;for(;--s>-1;)i=t[s],r=e[s],i!==r&&n.push({i:s,s:i,c:r-i});return!0},round:function(t){"endArray"in t&&(this._round=!0)},set:function(t){var e,i,r=this.target,s=this.a,n=s.length;if(this._round)for(;--n>-1;)e=s[n],i=e.s+e.c*t,r[e.i]=0|i+(i>0?.5:-.5);else for(;--n>-1;)e=s[n],i=e.s+e.c*t,r[e.i]=1e-6>i&&i>-1e-6?0:i}})}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: 0.5.1
 * DATE: 2014-02-14
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";var t,e,i,r,s={scale:1,shadowOffset:1,fillPatternOffset:1,offset:1,fill:2,stroke:2,shadowColor:2},n={},a={},o=/(\d|\.)+/g,l=/(?:_cw|_ccw|_short)/,h=window._gsDefine.globals.com.greensock.plugins,u={aqua:[0,255,255],lime:[0,255,0],silver:[192,192,192],black:[0,0,0],maroon:[128,0,0],teal:[0,128,128],blue:[0,0,255],navy:[0,0,128],white:[255,255,255],fuchsia:[255,0,255],olive:[128,128,0],yellow:[255,255,0],orange:[255,165,0],gray:[128,128,128],purple:[128,0,128],green:[0,128,0],red:[255,0,0],pink:[255,192,203],cyan:[0,255,255],transparent:[255,255,255,0]},_=function(t,e,i){return t=0>t?t+1:t>1?t-1:t,0|255*(1>6*t?e+6*(i-e)*t:.5>t?i:2>3*t?e+6*(i-e)*(2/3-t):e)+.5},p=function(t){if(""===t||null==t||"none"===t)return u.transparent;if(u[t])return u[t];if("number"==typeof t)return[t>>16,255&t>>8,255&t];if("#"===t.charAt(0))return 4===t.length&&(t="#"+t.charAt(1)+t.charAt(1)+t.charAt(2)+t.charAt(2)+t.charAt(3)+t.charAt(3)),t=parseInt(t.substr(1),16),[t>>16,255&t>>8,255&t];if("hsl"===t.substr(0,3)){t=t.match(o);var e=Number(t[0])%360/360,i=Number(t[1])/100,r=Number(t[2])/100,s=.5>=r?r*(i+1):r+i-r*i,n=2*r-s;return t.length>3&&(t[3]=Number(t[3])),t[0]=_(e+1/3,n,s),t[1]=_(e,n,s),t[2]=_(e-1/3,n,s),t}for(var a=t.match(o)||u.transparent,l=a.length;--l>-1;)a[l]=Number(a[l]);return a},f=function(t,e,i,r){this.getter=e,this.setter=i;var s=p(t[e]());this.proxy={r:s[0],g:s[1],b:s[2],a:s.length>3?s[3]:1},r&&(this._next=r,r._prev=this)},c=[],d=function(){var i=c.length;if(0!==i){for(;--i>-1;)c[i].draw(),c[i]._gsDraw=!1;c.length=0}else t.removeEventListener("tick",d),e=!1},m=function(t,e){var i="x"===e?"y":"x",r="_gs_"+t;n[t]=function(){return this["get"+t]()[e]},a[t]=function(s){var n=this["get"+t](),a=this[r];return a||(a=this[r]={}),a[e]=s,a[i]=n[i],this[t](a),this}},g=function(t,e){return function(i){return arguments.length?e(i):t()}},v=function(t,e){var i,r,o,l,h=[];for(i in e)if(r=e[i],"bezier"!==i&&"autoDraw"!==i&&"set"!==i.substr(0,3)&&void 0===t[i]&&(h.push(i),delete e[i],i="set"+i.charAt(0).toUpperCase()+i.substr(1),e[i]=r),s[i]){if(1===s[i])return e[i+"X"]=e[i+"Y"]=e[i],delete e[i],v(t,e);!t[i]&&a[i]&&(l=t.prototype||t,l[i]=g(n[i],a[i]))}else if("bezier"===i)for(r=r instanceof Array?r:r.values||[],o=r.length;--o>-1;)0===o?h=h.concat(v(t,r[o])):v(t,r[o]);return h},y=function(t){var e,i={};for(e in t)i[e]=t[e];return i};for(r in s)1===s[r]&&(m(r,"x"),m(r,"y"));var w=window._gsDefine.plugin({propName:"kinetic",API:2,version:"0.5.1",init:function(e,r,n){var a,o,u,_,c,d;if(!i&&(i=5>parseInt(Kinetic.version.split(".")[0],10)))throw"The GSAP KineticPlugin that's loaded requires KineticJS version 5.0.0 or later. For earlier versions, use KineticPlugin from GSAP 1.11.3 or earlier.";this._overwriteProps=v(e,r),this._target=e,this._layer=r.autoDraw!==!1?e.getLayer():null,!t&&this._layer&&(t=n.constructor.ticker);for(a in r){if(o=r[a],2===s[a])_=this._firstSP=new f(e,a,a,this._firstSP),o=p(o),_.proxy.r!==o[0]&&this._addTween(_.proxy,"r",_.proxy.r,o[0],a),_.proxy.g!==o[1]&&this._addTween(_.proxy,"g",_.proxy.g,o[1],a),_.proxy.b!==o[2]&&this._addTween(_.proxy,"b",_.proxy.b,o[2],a),(o.length>3||1!==_.proxy.a)&&_.proxy.a!==o[3]&&this._addTween(_.proxy,"a",_.proxy.a,o.length>3?o[3]:1,a);else if("bezier"===a){if(c=h.BezierPlugin,!c)throw"BezierPlugin not loaded";c=this._bezier=new c,"object"==typeof o&&o.autoRotate===!0&&(o.autoRotate=["x","y","rotation",0,!1]),c._onInitTween(e,o,n),this._overwriteProps=this._overwriteProps.concat(c._overwriteProps),this._addTween(c,"setRatio",0,1,a)}else if("rotation"!==a&&"rotationDeg"!==a||"string"!=typeof o||!l.test(o))o instanceof Array?this._initArrayTween(e[a](),o,a):"autoDraw"!==a&&(u="get"+a.substr(3),this._addTween(e,a,("function"==typeof e[a]?e["get"!==u&&"function"==typeof e[u]?u:a]():e[a])||0,o,a));else{if(d=h.DirectionalRotationPlugin,!d)throw"DirectionalRotationPlugin not loaded";d=this._directionalRotation=new d,u={useRadians:!1},u[a]=o,d._onInitTween(e,u,n),this._addTween(d,"setRatio",0,1,a)}this._overwriteProps.push(a)}return!0},kill:function(t){return t=y(t),v(this._target,t),this._bezier&&this._bezier._kill(t),this._directionalRotation&&this._directionalRotation._kill(t),this._super._kill.call(this,t)},round:function(t,e){return t=y(t),v(this._target,t),this._bezier&&this._bezier._roundProps(t,e),this._super._roundProps.call(this,t,e)},set:function(i){this._super.setRatio.call(this,i);var r,s,n,a,o,l,h=this._firstSP,u=this._layer,_=this._arrayTweens;if(h)for(o=this._target;h;)l=h.proxy,o[h.setter]((1!==l.a?"rgba(":"rgb(")+(0|l.r)+", "+(0|l.g)+", "+(0|l.b)+(1!==l.a?", "+l.a:"")+")"),h=h._next;if(_){for(r=_.length;--r>-1;)s=_[r],a=s.s+s.c*i,s.a[s.i]=1e-6>a&&a>-1e-6?0:a;for(n in this._arrayProps)this._target[n](this._arrayProps[n])}u&&!u._gsDraw&&(c.push(u),u._gsDraw=!0,e||(t.addEventListener("tick",d),e=!0))}});r=w.prototype,r._initArrayTween=function(t,e,i){this._arrayTweens||(this._arrayTweens=[],this._arrayProps={});for(var r,s,n=t.length,a=this._arrayTweens;--n>-1;)r=t[n],s=e[n],r!==s&&a.push({a:t,i:n,s:r,c:s-r});a.length&&(this._arrayProps[i]=t)}}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: beta 0.2.0
 * DATE: 2013-02-27
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";var t=/[^\d\-\.]/g,e=Math.PI/180,i=/(\d|\.)+/g,r={aqua:[0,255,255],lime:[0,255,0],silver:[192,192,192],black:[0,0,0],maroon:[128,0,0],teal:[0,128,128],blue:[0,0,255],navy:[0,0,128],white:[255,255,255],fuchsia:[255,0,255],olive:[128,128,0],yellow:[255,255,0],orange:[255,165,0],gray:[128,128,128],purple:[128,0,128],green:[0,128,0],red:[255,0,0],pink:[255,192,203],cyan:[0,255,255],transparent:[255,255,255,0]},s=function(t){return"number"==typeof t?[t>>16,255&t>>8,255&t]:""===t||null==t||"none"===t||"string"!=typeof t?r.transparent:r[t]?r[t]:"#"===t.charAt(0)?(4===t.length&&(t="#"+t.charAt(1)+t.charAt(1)+t.charAt(2)+t.charAt(2)+t.charAt(3)+t.charAt(3)),t=parseInt(t.substr(1),16),[t>>16,255&t>>8,255&t]):t.match(i)||r.transparent},n={scaleX:1,scaleY:1,tx:1,ty:1,rotation:1,shortRotation:1,skewX:1,skewY:1,scale:1},a=function(t,e){var i=t.matrix,r=1e-6,s=i.a,n=i.b,a=i.c,o=i.d,l=e?t._gsTransform||{skewY:0}:{skewY:0},h=0>l.scaleX;return l.tx=i.e-(l.ox||0),l.ty=i.f-(l.oy||0),l.scaleX=Math.sqrt(s*s+n*n),l.scaleY=Math.sqrt(o*o+a*a),l.rotation=s||n?Math.atan2(n,s):l.rotation||0,l.skewX=a||o?Math.atan2(a,o)+l.rotation:l.skewX||0,Math.abs(l.skewX)>Math.PI/2&&(h?(l.scaleX*=-1,l.skewX+=0>=l.rotation?Math.PI:-Math.PI,l.rotation+=0>=l.rotation?Math.PI:-Math.PI):(l.scaleY*=-1,l.skewX+=0>=l.skewX?Math.PI:-Math.PI)),r>l.rotation&&l.rotation>-r&&(s||n)&&(l.rotation=0),r>l.skewX&&l.skewX>-r&&(n||a)&&(l.skewX=0),e&&(t._gsTransform=l),l},o=function(t,e){return null==t?e:"string"==typeof t&&1===t.indexOf("=")?parseInt(t.charAt(0)+"1",10)*Number(t.substr(2))+e:Number(t)},l=function(i,r){var s=-1===i.indexOf("rad")?e:1,n=1===i.indexOf("=");return i=Number(i.replace(t,""))*s,n?i+r:i},h=window._gsDefine.plugin({propName:"raphael",API:2,init:function(e,i,r){if(!e.attr)return!1;this._target=e,this._tween=r,this._props=e._gsProps=e._gsProps||{};var a,o,l,h,u,_,p;for(a in i)l=i[a],"transform"!==a?n[a]||"pivot"===a?this._parseTransform(e,i):(o=e.attr(a),this._firstPT=h={_next:this._firstPT,t:this._props,p:a,b:o,f:!1,n:"raphael_"+a,r:!1,type:0},"fill"===a||"stroke"===a?(u=s(o),_=s(l),h.e=l,h.s=Number(u[0]),h.c=Number(_[0])-h.s,h.gs=Number(u[1]),h.gc=Number(_[1])-h.gs,h.bs=Number(u[2]),h.bc=Number(_[2])-h.bs,u.length>3||_.length>3?(h.as=4>u.length?1:Number(u[3]),h.ac=(4>_.length?1:Number(_[3]))-h.as,h.type=2):h.type=1):(o="string"==typeof o?parseFloat(o.replace(t,"")):Number(o),"string"==typeof l?(p="="===l.charAt(1),l=parseFloat(l.replace(t,""))):p=!1,h.e=l||0===l?p?l+o:l:i[a],!o&&0!==o||!l&&0!==l||!(h.c=p?l:l-o)?(h.type=-1,h.i=i[a],h.s=h.c=0):h.s=o),this._overwriteProps.push("raphael_"+a),h._next&&(h._next._prev=h)):this._parseTransform(e,l);return!0},set:function(t){for(var e,i=this._firstPT;i;)e=i.c*t+i.s,i.r&&(e=e>0?e+.5>>0:e-.5>>0),i.type?1===i.type?i.t[i.p]="rgb("+(e>>0)+", "+(i.gs+t*i.gc>>0)+", "+(i.bs+t*i.bc>>0)+")":2===i.type?i.t[i.p]="rgba("+(e>>0)+", "+(i.gs+t*i.gc>>0)+", "+(i.bs+t*i.bc>>0)+", "+(i.as+t*i.ac)+")":-1===i.type&&(i.t[i.p]=i.i):i.t[i.p]=e,i=i._next;if(this._target.attr(this._props),this._transform){i=this._transform;var r=i.rotation,s=r-i.skewX,n=Math.cos(r)*i.scaleX,a=Math.sin(r)*i.scaleX,o=Math.sin(s)*-i.scaleY,l=Math.cos(s)*i.scaleY,h=1e-6,u=this._pxl,_=this._pyl;h>a&&a>-h&&(a=0),h>o&&o>-h&&(o=0),i.ox=this._pxg-(u*n+_*o),i.oy=this._pyg-(u*a+_*l),this._target.transform("m"+n+","+a+","+o+","+l+","+(i.tx+i.ox)+","+(i.ty+i.oy))}}}),u=h.prototype;u._parseTransform=function(t,i){if(!this._transform){var r,s,h,u,_,p,f,c,d,m=this._transform=a(t,!0),g=1e-6;if("object"==typeof i){if(r={scaleX:o(null!=i.scaleX?i.scaleX:i.scale,m.scaleX),scaleY:o(null!=i.scaleY?i.scaleY:i.scale,m.scaleY),tx:o(i.tx,m.tx),ty:o(i.ty,m.ty)},null!=i.shortRotation){r.rotation="number"==typeof i.shortRotation?i.shortRotation*e:l(i.shortRotation,m.rotation);var v=(r.rotation-m.rotation)%(2*Math.PI);v!==v%Math.PI&&(v+=Math.PI*(0>v?2:-2)),r.rotation=m.rotation+v}else r.rotation=null==i.rotation?m.rotation:"number"==typeof i.rotation?i.rotation*e:l(i.rotation,m.rotation);r.skewX=null==i.skewX?m.skewX:"number"==typeof i.skewX?i.skewX*e:l(i.skewX,m.skewX),r.skewY=null==i.skewY?m.skewY:"number"==typeof i.skewY?i.skewY*e:l(i.skewY,m.skewY),(s=r.skewY-m.skewY)&&(r.skewX+=s,r.rotation+=s),g>r.skewY&&r.skewY>-g&&(r.skewY=0),g>r.skewX&&r.skewX>-g&&(r.skewX=0),g>r.rotation&&r.rotation>-g&&(r.rotation=0),d=i.localPivot||i.globalPivot,"string"==typeof d?(_=d.split(","),p=Number(_[0]),f=Number(_[1])):"object"==typeof d?(p=Number(d.x),f=Number(d.y)):i.localPivot?(_=t.getBBox(!0),p=_.width/2,f=_.height/2):(_=t.getBBox(),p=_.x+_.width/2,f=_.y+_.height/2),i.localPivot?(c=t.matrix,p+=t.attr("x"),f+=t.attr("y"),this._pxl=p,this._pyl=f,this._pxg=p*c.a+f*c.c+c.e-m.tx,this._pyg=p*c.b+f*c.d+c.f-m.ty):(c=t.matrix.invert(),this._pxl=p*c.a+f*c.c+c.e,this._pyl=p*c.b+f*c.d+c.f,this._pxg=p-m.tx,this._pyg=f-m.ty)}else{if("string"!=typeof i)return;_=this._target.transform(),t.transform(i),r=a(t,!1),t.transform(_)}for(h in n)m[h]!==r[h]&&"shortRotation"!==h&&"scale"!==h&&(this._firstPT=u={_next:this._firstPT,t:m,p:h,s:m[h],c:r[h]-m[h],n:h,f:!1,r:!1,b:m[h],e:r[h],type:0},u._next&&(u._next._prev=u),this._overwriteProps.push("raphael_"+h))}}}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: beta 1.4.0
 * DATE: 2013-02-27
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 **/
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";var t=window._gsDefine.plugin({propName:"roundProps",priority:-1,API:2,init:function(t,e,i){return this._tween=i,!0}}),e=t.prototype;e._onInitAllProps=function(){for(var t,e,i,r=this._tween,s=r.vars.roundProps instanceof Array?r.vars.roundProps:r.vars.roundProps.split(","),n=s.length,a={},o=r._propLookup.roundProps;--n>-1;)a[s[n]]=1;for(n=s.length;--n>-1;)for(t=s[n],e=r._firstPT;e;)i=e._next,e.pg?e.t._roundProps(a,!0):e.n===t&&(this._add(e.t,t,e.s,e.c),i&&(i._prev=e._prev),e._prev?e._prev._next=i:r._firstPT===e&&(r._firstPT=i),e._next=e._prev=null,r._propLookup[t]=o),e=i;return!1},e._add=function(t,e,i,r){this._addTween(t,e,i,i+r,e,!0),this._overwriteProps.push(e)}}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: 1.7.3
 * DATE: 2014-01-14
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 **/
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";var t=document.documentElement,e=window,i=function(i,s){var r="x"===s?"Width":"Height",n="scroll"+r,a="client"+r,o=document.body;return i===e||i===t||i===o?Math.max(t[n],o[n])-(e["inner"+r]||Math.max(t[a],o[a])):i[n]-i["offset"+r]},s=window._gsDefine.plugin({propName:"scrollTo",API:2,version:"1.7.3",init:function(t,s,r){return this._wdw=t===e,this._target=t,this._tween=r,"object"!=typeof s&&(s={y:s}),this._autoKill=s.autoKill!==!1,this.x=this.xPrev=this.getX(),this.y=this.yPrev=this.getY(),null!=s.x?(this._addTween(this,"x",this.x,"max"===s.x?i(t,"x"):s.x,"scrollTo_x",!0),this._overwriteProps.push("scrollTo_x")):this.skipX=!0,null!=s.y?(this._addTween(this,"y",this.y,"max"===s.y?i(t,"y"):s.y,"scrollTo_y",!0),this._overwriteProps.push("scrollTo_y")):this.skipY=!0,!0},set:function(t){this._super.setRatio.call(this,t);var s=this._wdw||!this.skipX?this.getX():this.xPrev,r=this._wdw||!this.skipY?this.getY():this.yPrev,n=r-this.yPrev,a=s-this.xPrev;this._autoKill&&(!this.skipX&&(a>7||-7>a)&&i(this._target,"x")>s&&(this.skipX=!0),!this.skipY&&(n>7||-7>n)&&i(this._target,"y")>r&&(this.skipY=!0),this.skipX&&this.skipY&&this._tween.kill()),this._wdw?e.scrollTo(this.skipX?s:this.x,this.skipY?r:this.y):(this.skipY||(this._target.scrollTop=this.y),this.skipX||(this._target.scrollLeft=this.x)),this.xPrev=this.x,this.yPrev=this.y}}),r=s.prototype;s.max=i,r.getX=function(){return this._wdw?null!=e.pageXOffset?e.pageXOffset:null!=t.scrollLeft?t.scrollLeft:document.body.scrollLeft:this._target.scrollLeft},r.getY=function(){return this._wdw?null!=e.pageYOffset?e.pageYOffset:null!=t.scrollTop?t.scrollTop:document.body.scrollTop:this._target.scrollTop},r._kill=function(t){return t.scrollTo_x&&(this.skipX=!0),t.scrollTo_y&&(this.skipY=!0),this._super._kill.call(this,t)}}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: 0.5.0
 * DATE: 2013-07-10
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";var t=function(e){var i=e.nodeType,s="";if(1===i||9===i||11===i){if("string"==typeof e.textContent)return e.textContent;for(e=e.firstChild;e;e=e.nextSibling)s+=t(e)}else if(3===i||4===i)return e.nodeValue;return s},e=window._gsDefine.plugin({propName:"text",API:2,version:"0.5.0",init:function(e,i,s){var r,n;if(!("innerHTML"in e))return!1;if(this._target=e,"object"!=typeof i&&(i={value:i}),void 0===i.value)return this._text=this._original=[""],!0;for(this._delimiter=i.delimiter||"",this._original=t(e).replace(/\s+/g," ").split(this._delimiter),this._text=i.value.replace(/\s+/g," ").split(this._delimiter),this._runBackwards=s.vars.runBackwards===!0,this._runBackwards&&(r=this._original,this._original=this._text,this._text=r),"string"==typeof i.newClass&&(this._newClass=i.newClass,this._hasClass=!0),"string"==typeof i.oldClass&&(this._oldClass=i.oldClass,this._hasClass=!0),r=this._original.length-this._text.length,n=0>r?this._original:this._text,this._fillChar=i.fillChar||(i.padSpace?"&nbsp;":""),0>r&&(r=-r);--r>-1;)n.push(this._fillChar);return!0},set:function(t){t>1?t=1:0>t&&(t=0),this._runBackwards&&(t=1-t);var e,i,s,r=this._text.length,n=0|t*r+.5;this._hasClass?(e=this._newClass&&0!==n,i=this._oldClass&&n!==r,s=(e?"<span class='"+this._newClass+"'>":"")+this._text.slice(0,n).join(this._delimiter)+(e?"</span>":"")+(i?"<span class='"+this._oldClass+"'>":"")+this._delimiter+this._original.slice(n).join(this._delimiter)+(i?"</span>":"")):s=this._text.slice(0,n).join(this._delimiter)+this._delimiter+this._original.slice(n).join(this._delimiter),this._target.innerHTML="&nbsp;"===this._fillChar&&-1!==s.indexOf("  ")?s.split("  ").join("&nbsp;&nbsp;"):s}}),i=e.prototype;i._newClass=i._oldClass=i._delimiter=""}),window._gsDefine&&window._gsQueue.pop()();
/*!
 * VERSION: 0.10.0
 * DATE: 2014-02-20
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * Requires TweenLite and CSSPlugin version 1.11.0 or later (TweenMax contains both TweenLite and CSSPlugin). ThrowPropsPlugin is required for momentum-based continuation of movement after the mouse/touch is released (ThrowPropsPlugin is a membership benefit of Club GreenSock - http://www.greensock.com/club/).
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */
(window._gsQueue||(window._gsQueue=[])).push(function(){"use strict";window._gsDefine("utils.Draggable",["events.EventDispatcher","TweenLite"],function(t,e){var i,s,r,n,a,o={css:{}},h={css:{}},l={css:{}},u={css:{}},_={},c=document,p=c.documentElement||{},f=[],d=function(){return!1},m=180/Math.PI,g=999999999999999,v=Date.now||function(){return(new Date).getTime()},y=c.all&&!c.addEventListener,T=[],w={},x=0,b=/^(?:a|input|textarea|button|select)$/i,P=0,S=0,C=function(){for(var t=T.length;--t>-1;)T[t]()},k=function(t){T.push(t),1===T.length&&e.ticker.addEventListener("tick",C)},R=function(t){for(var i=T.length;--i>-1;)T[i]===t&&T.splice(i,1);e.to(D,0,{overwrite:"all",delay:15,onComplete:D})},D=function(){T.length||e.ticker.removeEventListener("tick",C)},A=function(t,e){var i;for(i in e)void 0===t[i]&&(t[i]=e[i]);return t},O=function(t,e){return t=t||window.event,_.pageX=t.clientX+c.body.scrollLeft+p.scrollLeft,_.pageY=t.clientY+c.body.scrollTop+p.scrollTop,e&&(t.returnValue=!1),_},M=function(t){return t?("string"==typeof t&&(t=e.selector(t)),t.length&&t!==window&&t[0]&&t[0].style&&!t.nodeType&&(t=t[0]),t===window||t.nodeType&&t.style?t:null):t},L=function(t,e){var s,r,n,a=t.style;if(void 0===a[e]){for(n=["O","Moz","ms","Ms","Webkit"],r=5,s=e.charAt(0).toUpperCase()+e.substr(1);--r>-1&&void 0===a[n[r]+s];);if(0>r)return"";i=3===r?"ms":n[r],e=i+s}return e},E=function(t,e,i){var s=t.style;void 0===s[e]&&(e=L(t,e)),null==i?s.removeProperty?s.removeProperty(e.replace(/([A-Z])/g,"-$1").toLowerCase()):s.removeAttribute(e):void 0!==s[e]&&(s[e]=i)},N=c.defaultView?c.defaultView.getComputedStyle:d,I=/(?:Left|Right|Width)/i,X=/(?:\d|\-|\+|=|#|\.)*/g,F=function(t,e,i,s,r){if("px"===s||!s)return i;if("auto"===s||!i)return 0;var n,a=I.test(e),o=t,h=j.style,l=0>i;return l&&(i=-i),"%"===s&&-1!==e.indexOf("border")?n=i/100*(a?t.clientWidth:t.clientHeight):(h.cssText="border:0 solid red;position:"+Y(t,"position",!0)+";line-height:0;","%"!==s&&o.appendChild?h[a?"borderLeftWidth":"borderTopWidth"]=i+s:(o=t.parentNode||c.body,h[a?"width":"height"]=i+s),o.appendChild(j),n=parseFloat(j[a?"offsetWidth":"offsetHeight"]),o.removeChild(j),0!==n||r||(n=F(t,e,i,s,!0))),l?-n:n},U=function(t,e){if("absolute"!==Y(t,"position",!0))return 0;var i="left"===e?"Left":"Top",s=Y(t,"margin"+i,!0);return t["offset"+i]-(F(t,e,parseFloat(s),s.replace(X,""))||0)},Y=function(t,e,i){var s,r=(t._gsTransform||{})[e];return r||0===r?r:(t.style[e]?r=t.style[e]:(s=N(t))?(r=s.getPropertyValue(e.replace(/([A-Z])/g,"-$1").toLowerCase()),r=r||s.length?r:s[e]):t.currentStyle&&(r=t.currentStyle[e]),"auto"!==r||"top"!==e&&"left"!==e||(r=U(t,e)),i?r:parseFloat(r)||0)},B=function(t,e,i){var s=t.vars,r=s[i],n=t._listeners[e];"function"==typeof r&&r.apply(s[i+"Scope"]||t,s[i+"Params"]||[t.pointerEvent]),n&&t.dispatchEvent(e)},z=function(t,e){var i,s,r,n=M(t);return n?ee(n,e):void 0!==t.left?(r=G(e),{left:t.left-r.x,top:t.top-r.y,width:t.width,height:t.height}):(s=t.min||t.minX||t.minRotation||0,i=t.min||t.minY||0,{left:s,top:i,width:(t.max||t.maxX||t.maxRotation||0)-s,height:(t.max||t.maxY||0)-i})},j=c.createElement("div"),W=""!==L(j,"perspective"),H=L(j,"transformOrigin").replace(/^ms/g,"Ms").replace(/([A-Z])/g,"-$1").toLowerCase(),q=L(j,"transform"),V=q.replace(/^ms/g,"Ms").replace(/([A-Z])/g,"-$1").toLowerCase(),Q={},$={},G=function(t,e){if(e=e||{},!t||t===document.body||!t.parentNode)return{x:0,y:0};var i=N(t),s=H&&i?i.getPropertyValue(H):"50% 50%",r=s.split(" "),n=-1!==s.indexOf("left")?"0%":-1!==s.indexOf("right")?"100%":r[0],a=-1!==s.indexOf("top")?"0%":-1!==s.indexOf("bottom")?"100%":r[1];return("center"===a||null==a)&&(a="50%"),("center"===n||isNaN(parseFloat(n)))&&(n="50%"),e.x=-1!==n.indexOf("%")?t.offsetWidth*parseFloat(n)/100:parseFloat(n),e.y=-1!==a.indexOf("%")?t.offsetHeight*parseFloat(a)/100:parseFloat(a),e},Z=function(t,e,i){var s,r;return t!==window&&t&&t.parentNode?(s=N(t),r=s?s.getPropertyValue(V):t.currentStyle?t.currentStyle[q]:"1,0,0,1,0,0",r=(r+"").match(/(?:\-|\b)[\d\-\.e]+\b/g)||[1,0,0,1,0,0],r.length>6&&(r=[r[0],r[1],r[4],r[5],r[12],r[13]]),e&&(r[4]=Number(r[4])+e.x+t.offsetLeft-i.x,r[5]=Number(r[5])+e.y+t.offsetTop-i.y,void 0===n&&c.body&&q&&(n=function(){var t,e,i=c.createElement("div"),s=c.createElement("div");return s.style.position="absolute",c.body.appendChild(i),i.appendChild(s),t=s.offsetParent,i.style[q]="rotate(1deg)",e=s.offsetParent===t,c.body.removeChild(i),e}()),!t.parentNode||t.parentNode.offsetParent!==t.offsetParent||n&&"100100"!==Z(t.parentNode).join("")||(r[4]-=t.parentNode.offsetLeft,r[5]-=t.parentNode.offsetTop)),r):[1,0,0,1,0,0]},K=function(t,e){for(var i,s,r,n,a,o,h,l,u=G(t,Q),_=G(t.parentNode,$),c=Z(t,u,_);(t=t.parentNode)&&t.parentNode&&t!==document.body;)u=_,_=G(t.parentNode,u===Q?$:Q),h=Z(t,u,_),i=c[0],s=c[1],r=c[2],n=c[3],a=c[4],o=c[5],c[0]=i*h[0]+s*h[2],c[1]=i*h[1]+s*h[3],c[2]=r*h[0]+n*h[2],c[3]=r*h[1]+n*h[3],c[4]=a*h[0]+o*h[2]+h[4],c[5]=a*h[1]+o*h[3]+h[5];return e&&(i=c[0],s=c[1],r=c[2],n=c[3],a=c[4],o=c[5],l=i*n-s*r,c[0]=n/l,c[1]=-s/l,c[2]=-r/l,c[3]=i/l,c[4]=(r*o-n*a)/l,c[5]=-(i*o-s*a)/l),c},J=function(t,e,i){var s=K(t),r=e.x,n=e.y;return i=i===!0?e:i||{},i.x=r*s[0]+n*s[2]+s[4],i.y=r*s[1]+n*s[3]+s[5],i},te=function(t,e,i){var s=t.x*e[0]+t.y*e[2]+e[4],r=t.x*e[1]+t.y*e[3]+e[5];return t.x=s*i[0]+r*i[2]+i[4],t.y=s*i[1]+r*i[3]+i[5],t},ee=function(t,e){var i,s,r,n,a,o,h,l,u,_,f;return t===window?(n=null!=t.pageYOffset?t.pageYOffset:null!=c.scrollTop?c.scrollTop:p.scrollTop||c.body.scrollTop||0,s=null!=t.pageXOffset?t.pageXOffset:null!=c.scrollLeft?c.scrollLeft:p.scrollLeft||c.body.scrollLeft||0,r=s+(p.clientWidth||t.innerWidth||c.body.clientWidth||0),a=n+(t.innerHeight-20<p.clientHeight?p.clientHeight:t.innerHeight||c.body.clientHeight||0)):(i=G(t),s=-i.x,r=s+t.offsetWidth,n=-i.y,a=n+t.offsetHeight),t===e?{left:s,top:n,width:r-s,height:a-n}:(o=K(t),h=K(e,!0),l=te({x:s,y:n},o,h),u=te({x:r,y:n},o,h),_=te({x:r,y:a},o,h),f=te({x:s,y:a},o,h),s=Math.min(l.x,u.x,_.x,f.x),n=Math.min(l.y,u.y,_.y,f.y),{left:s,top:n,width:Math.max(l.x,u.x,_.x,f.x)-s,height:Math.max(l.y,u.y,_.y,f.y)-n})},ie=function(t){return t.length&&t[0]&&(t[0].nodeType&&t[0].style&&!t.nodeType||t[0].length&&t[0][0])?!0:!1},se=function(t){var e,i,s,r=[],n=t.length;for(e=0;n>e;e++)if(i=t[e],ie(i))for(s=i.length,s=0;i.length>s;s++)r.push(i[s]);else r.push(i);return r},re="ontouchstart"in p&&"orientation"in window,ne=function(t){for(var e=t.split(","),i=(void 0!==j.onpointerdown?"pointerdown,pointermove,pointerup,pointercancel":void 0!==j.onmspointerdown?"MSPointerDown,MSPointerMove,MSPointerUp,MSPointerCancel":t).split(","),s={},r=7;--r>-1;)s[e[r]]=i[r],s[i[r]]=e[r];return s}("touchstart,touchmove,touchend,touchcancel"),ae=function(t,e,i){t.addEventListener?t.addEventListener(ne[e]||e,i,!1):t.attachEvent&&t.attachEvent("on"+e,i)},oe=function(t,e,i){t.removeEventListener?t.removeEventListener(ne[e]||e,i):t.detachEvent&&t.detachEvent("on"+e,i)},he=function(t){s=t.touches&&t.touches.length>P,oe(t.target,"touchend",he)},le=function(t){s=t.touches&&t.touches.length>P,ae(t.target,"touchend",he)},ue=function(t,e,i,s,r,n){var a,o,h,l={};if(e)if(1!==r&&e instanceof Array)for(l.end=a=[],h=e.length,o=0;h>o;o++)a[o]=e[o]*r;else l.end="function"==typeof e?function(i){return e.call(t,i)*r}:e;return(i||0===i)&&(l.max=i),(s||0===s)&&(l.min=s),n&&(l.velocity=0),l},_e=function(t){var e;return t&&t.getAttribute&&"BODY"!==t.nodeName?"true"===(e=t.getAttribute("data-clickable"))||"false"!==e&&(t.onclick||b.test(t.nodeName+""))?!0:_e(t.parentNode):!1},ce=function(){var t,e=c.createElement("div"),i=c.createElement("div"),s=i.style,r=c.body||j;return s.display="inline-block",s.position="relative",e.style.cssText=i.innerHTML="width:90px; height:40px; padding:10px; overflow:auto; visibility: hidden",e.appendChild(i),r.appendChild(e),a=i.offsetHeight+18>e.scrollHeight,s.width="100%",q||(s.paddingRight="500px",t=e.scrollLeft=e.scrollWidth-e.clientWidth,s.left="-90px",t=t!==e.scrollLeft),r.removeChild(e),t}(),pe=function(t,i){t=M(t),i=i||{};var s,r,n,o,h,l,u=c.createElement("div"),_=u.style,p=t.firstChild,f=0,d=0,m=t.scrollTop,g=t.scrollLeft,v=t.scrollWidth,T=t.scrollHeight,w=0,x=0,b=0;W&&i.force3D!==!1?(h="translate3d(",l="px,0px)"):q&&(h="translate(",l="px)"),this.scrollTop=function(t,e){return arguments.length?(this.top(-t,e),void 0):-this.top()},this.scrollLeft=function(t,e){return arguments.length?(this.left(-t,e),void 0):-this.left()},this.left=function(s,r){if(!arguments.length)return-(t.scrollLeft+d);var n=t.scrollLeft-g,a=d;return(n>2||-2>n)&&!r?(g=t.scrollLeft,e.killTweensOf(this,!0,{left:1,scrollLeft:1}),this.left(-g),i.onKill&&i.onKill(),void 0):(s=-s,0>s?(d=0|s-.5,s=0):s>x?(d=0|s-x,s=x):d=0,(d||a)&&(h?this._suspendTransforms||(_[q]=h+-d+"px,"+-f+l):_.left=-d+"px",ce&&d+w>=0&&(_.paddingRight=d+w+"px")),t.scrollLeft=0|s,g=t.scrollLeft,void 0)},this.top=function(s,r){if(!arguments.length)return-(t.scrollTop+f);var n=t.scrollTop-m,a=f;return(n>2||-2>n)&&!r?(m=t.scrollTop,e.killTweensOf(this,!0,{top:1,scrollTop:1}),this.top(-m),i.onKill&&i.onKill(),void 0):(s=-s,0>s?(f=0|s-.5,s=0):s>b?(f=0|s-b,s=b):f=0,(f||a)&&(h?this._suspendTransforms||(_[q]=h+-d+"px,"+-f+l):_.top=-f+"px"),t.scrollTop=0|s,m=t.scrollTop,void 0)},this.maxScrollTop=function(){return b},this.maxScrollLeft=function(){return x},this.disable=function(){for(p=u.firstChild;p;)o=p.nextSibling,t.appendChild(p),p=o;t===u.parentNode&&t.removeChild(u)},this.enable=function(){if(p=t.firstChild,p!==u){for(;p;)o=p.nextSibling,u.appendChild(p),p=o;t.appendChild(u),this.calibrate()}},this.calibrate=function(e){var i,o,h=t.clientWidth===s;m=t.scrollTop,g=t.scrollLeft,(!h||t.clientHeight!==r||u.offsetHeight!==n||v!==t.scrollWidth||T!==t.scrollHeight||e)&&((f||d)&&(i=this.left(),o=this.top(),this.left(-t.scrollLeft),this.top(-t.scrollTop)),(!h||e)&&(_.display="block",_.width="auto",_.paddingRight="0px",w=Math.max(0,t.scrollWidth-t.clientWidth),w&&(w+=Y(t,"paddingLeft")+(a?Y(t,"paddingRight"):0))),_.display="inline-block",_.position="relative",_.overflow="visible",_.width="100%",_.paddingRight=w+"px",a&&(_.paddingBottom=Y(t,"paddingBottom",!0)),y&&(_.zoom="1"),s=t.clientWidth,r=t.clientHeight,v=t.scrollWidth,T=t.scrollHeight,x=t.scrollWidth-s,b=t.scrollHeight-r,n=u.offsetHeight,(i||o)&&(this.left(i),this.top(o)))},this.content=u,this.element=t,this._suspendTransforms=!1,this.enable()},fe=function(i,n){t.call(this,i),i=M(i),r||(r=(window.GreenSockGlobals||window).com.greensock.plugins.ThrowPropsPlugin),this.vars=n=n||{},this.target=i,this.x=this.y=this.rotation=0,this.dragResistance=parseFloat(n.dragResistance)||0,this.edgeResistance=isNaN(n.edgeResistance)?1:parseFloat(n.edgeResistance)||0,this.lockAxis=n.lockAxis;var a,_,p,T,b,C,D,L,N,I,X,F,U,j,W,H,q,V,Q,$,G,Z,te,ee,ie,se=(n.type||(y?"top,left":"x,y")).toLowerCase(),he=-1!==se.indexOf("x")||-1!==se.indexOf("y"),ce=-1!==se.indexOf("rotation"),de=he?"x":"left",me=he?"y":"top",ge=-1!==se.indexOf("x")||-1!==se.indexOf("left")||"scroll"===se,ve=-1!==se.indexOf("y")||-1!==se.indexOf("top")||"scroll"===se,ye=this,Te=M(n.trigger||n.handle||i),we={},xe=0,be=function(t){if(q){var s=ye.x,r=ye.y,n=1e-6;n>s&&s>-n&&(s=0),n>r&&r>-n&&(r=0),ce?(U.rotation=ye.rotation=ye.x,e.set(i,F)):a?(ve&&a.top(r),ge&&a.left(s)):he?(ve&&(U.y=r),ge&&(U.x=s),e.set(i,F)):(ve&&(i.style.top=r+"px"),ge&&(i.style.left=s+"px")),D&&!t&&B(ye,"drag","onDrag")}q=!1},Pe=function(t,e){var s;he?(ye.y=i._gsTransform.y,ye.x=i._gsTransform.x):ce?ye.x=ye.rotation=i._gsTransform.rotation:a?(ye.y=a.top(),ye.x=a.left()):(ye.y=parseInt(i.style.top,10)||0,ye.x=parseInt(i.style.left,10)||0),!Q&&!$||e||(Q&&(s=Q(ye.x),s!==ye.x&&(ye.x=s,ce&&(ye.rotation=s),q=!0)),$&&(s=$(ye.y),s!==ye.y&&(ye.y=s,q=!0)),q&&be(!0)),n.onThrowUpdate&&!t&&n.onThrowUpdate.apply(n.onThrowUpdateScope||ye,n.onThrowUpdateParams||f)},Se=function(){var t,e,s,r;C=!1,a?(a.calibrate(),ye.minX=N=-a.maxScrollLeft(),ye.minY=X=-a.maxScrollTop(),ye.maxX=L=ye.maxY=I=0,C=!0):n.bounds&&(t=z(n.bounds,i.parentNode),ce?(ye.minX=N=t.left,ye.maxX=L=t.left+t.width,ye.minY=X=ye.maxY=I=0):void 0!==n.bounds.maxX||void 0!==n.bounds.maxY?(t=n.bounds,ye.minX=N=t.minX,ye.minY=X=t.minY,ye.maxX=L=t.maxX,ye.maxY=I=t.maxY):(e=z(i,i.parentNode),ye.minX=N=Y(i,de)+t.left-e.left,ye.minY=X=Y(i,me)+t.top-e.top,ye.maxX=L=N+(t.width-e.width),ye.maxY=I=X+(t.height-e.height)),N>L&&(ye.minX=L,ye.maxX=L=N,N=ye.minX),X>I&&(ye.minY=I,ye.maxY=I=X,X=ye.minY),ce&&(ye.minRotation=N,ye.maxRotation=L),C=!0),n.liveSnap&&(s=n.liveSnap===!0?n.snap||{}:n.liveSnap,r=s instanceof Array||"function"==typeof s,ce?(Q=De(r?s:s.rotation,N,L,1),$=null):(Q=De(r?s:s.x||s.left||s.scrollLeft,N,L,a?-1:1),$=De(r?s:s.y||s.top||s.scrollTop,X,I,a?-1:1)))},Ce=function(t,e){var s,o,h;t&&r?(t===!0&&(s=n.snap||{},o=s instanceof Array||"function"==typeof s,t={resistance:(n.throwResistance||n.resistance||1e3)/(ce?10:1)},ce?t.rotation=ue(ye,o?s:s.rotation,L,N,1,e):(ge&&(t[de]=ue(ye,o?s:s.x||s.left||s.scrollLeft,L,N,a?-1:1,e||ye.lockAxis&&"x"===te)),ve&&(t[me]=ue(ye,o?s:s.y||s.top||s.scrollTop,I,X,a?-1:1,e||ye.lockAxis&&"y"===te)))),ye.tween=h=r.to(a||i,{throwProps:t,ease:n.ease||Power3.easeOut,onComplete:n.onThrowComplete,onCompleteParams:n.onThrowCompleteParams,onCompleteScope:n.onThrowCompleteScope||ye,onUpdate:n.fastMode?n.onThrowUpdate:Pe,onUpdateParams:n.onThrowUpdateParams,onUpdateScope:n.onThrowUpdateScope||ye},isNaN(n.maxDuration)?2:n.maxDuration,isNaN(n.minDuration)?.5:n.minDuration,isNaN(n.overshootTolerance)?1-ye.edgeResistance+.2:n.overshootTolerance),n.fastMode||(a&&(a._suspendTransforms=!0),h.seek(h.duration()),Pe(!0,!0),ye.endX=ye.x,ye.endY=ye.y,ce&&(ye.endRotation=ye.x),h.play(0),Pe(!0,!0),a&&(a._suspendTransforms=!1))):C&&ye.applyBounds()},ke=function(){var t=1-ye.edgeResistance;ee=K(i.parentNode,!0),ee[1]||ee[2]||1!=ee[0]||1!=ee[3]||(ee=null),a?(Se(),b=a.top(),T=a.left()):(Re()?(Pe(!0,!0),Se()):ye.applyBounds(),ce?(H=J(i,{x:0,y:0}),Pe(!0,!0),T=ye.x,b=ye.y=Math.atan2(H.y-p,_-H.x)*m):(b=Y(i,me),T=Y(i,de))),C&&t&&(T>L?T=L+(T-L)/t:N>T&&(T=N-(N-T)/t),ce||(b>I?b=I+(b-I)/t:X>b&&(b=X-(X-b)/t)))},Re=function(){return ye.tween&&ye.tween.isActive()},De=function(t,e,i,s){return"function"==typeof t?function(r){var n=ye.isPressed?1-ye.edgeResistance:1;return t.call(ye,r>i?i+(r-i)*n:e>r?e+(r-e)*n:r)*s}:t instanceof Array?function(s){for(var r,n,a=t.length,o=0,h=g;--a>-1;)r=t[a],n=r-s,0>n&&(n=-n),h>n&&r>=e&&i>=r&&(o=a,h=n);return t[o]}:isNaN(t)?function(t){return t}:function(){return t*s}},Ae=function(t){var s;if(!ye.isPressed&&t){if(ie=Re(),ye.pointerEvent=t,ne[t.type]?(Z=-1!==t.type.indexOf("touch")?Te:c,ae(Z,"touchend",Me),ae(Z,"touchmove",Oe),ae(Z,"touchcancel",Me),ae(c,"touchstart",le)):(Z=null,ae(c,"mousemove",Oe),ae(c,"mouseup",Me)),G=_e(t.target)&&!n.dragClickables)return ae(t.target,"change",Me),void 0;y?t=O(t,!0):t.touches&&t.touches.length>P+1||(t.preventDefault(),t.preventManipulation&&t.preventManipulation()),t.changedTouches?(t=j=t.changedTouches[0],W=t.identifier):t.pointerId?W=t.pointerId:j=null,P++,k(be),ye.tween&&ye.tween.kill(),e.killTweensOf(a||i,!0,we),p=ye.pointerY=t.pageY,_=ye.pointerX=t.pageX,ke(),ee&&(s=_*ee[0]+p*ee[2]+ee[4],p=_*ee[1]+p*ee[3]+ee[5],_=s),ye.tween=te=null,ce||a||n.zIndexBoost===!1||(i.style.zIndex=fe.zIndex++),ye.isPressed=!0,D=!(!n.onDrag&&!ye._listeners.drag),ce||E(Te,"cursor",n.cursor||"move"),B(ye,"press","onPress")}},Oe=function(t){if(!s&&ye.isPressed){y?t=O(t,!0):(t.preventDefault(),t.preventManipulation&&t.preventManipulation()),ye.pointerEvent=t;var e,i,r,n,a,o,h,l,u,c=t.changedTouches,f=1-ye.dragResistance,d=1-ye.edgeResistance;if(c){if(t=c[0],t!==j&&t.identifier!==W){for(a=c.length;--a>-1&&(t=c[a]).identifier!==W;);if(0>a)return}}else if(t.pointerId&&W&&t.pointerId!==W)return;h=ye.pointerX=t.pageX,l=ye.pointerY=t.pageY,ce?(n=Math.atan2(H.y-t.pageY,t.pageX-H.x)*m,o=ye.y-n,ye.y=n,o>180?b-=360:-180>o&&(b+=360),r=T+(b-n)*f):(ee&&(u=h*ee[0]+l*ee[2]+ee[4],l=h*ee[1]+l*ee[3]+ee[5],h=u),i=l-p,e=h-_,2>i&&i>-2&&(i=0),2>e&&e>-2&&(e=0),ye.lockAxis&&(e||i)&&("y"===te||!te&&Math.abs(e)>Math.abs(i)&&ge?(i=0,te="y"):ve&&(e=0,te="x")),r=T+e*f,n=b+i*f),Q||$?(Q&&(r=Q(r)),$&&(n=$(n))):C&&(r>L?r=L+(r-L)*d:N>r&&(r=N+(r-N)*d),ce||(n>I?n=I+(n-I)*d:X>n&&(n=X+(n-X)*d))),(ye.x!==r||ye.y!==n&&!ce)&&(ye.x=ye.endX=r,ce?ye.endRotation=r:ye.y=ye.endY=n,q=!0,ye.isDragging||(ye.isDragging=!0,B(ye,"dragstart","onDragStart")))}},Me=function(t,e){if(!t||!W||e||!t.pointerId||t.pointerId===W){ye.isPressed=!1;var i,s,r=t,a=ye.isDragging;if(Z?(oe(Z,"touchend",Me),oe(Z,"touchmove",Oe),oe(Z,"touchcancel",Me),oe(c,"touchstart",le)):(oe(c,"mouseup",Me),oe(c,"mousemove",Oe)),q=!1,G)return t&&oe(t.target,"change",Me),B(ye,"release","onRelease"),B(ye,"click","onClick"),G=!1,void 0;if(R(be),ce||E(Te,"cursor",n.cursor||"move"),a&&(xe=S=v(),ye.isDragging=!1),P--,t){if(y&&(t=O(t,!1)),i=t.changedTouches,i&&(t=i[0],t!==j&&t.identifier!==W)){for(s=i.length;--s>-1&&(t=i[s]).identifier!==W;);if(0>s)return}ye.pointerEvent=r,ye.pointerX=t.pageX,ye.pointerY=t.pageY}return r&&!a?(ie&&n.snap&&Ce(n.throwProps),B(ye,"release","onRelease"),B(ye,"click","onClick")):(Ce(n.throwProps),y||!r||!n.dragClickables&&_e(r.target)||(r.preventDefault(),r.preventManipulation&&r.preventManipulation()),B(ye,"release","onRelease")),a&&B(ye,"dragend","onDragEnd"),!0}},Le=function(t){(ye.isPressed||20>v()-xe)&&(t.preventDefault(),t.preventManipulation&&t.preventManipulation())};V=fe.get(this.target),V&&V.kill(),this.startDrag=function(t){Ae(t),ye.isDragging||(ye.isDragging=!0,B(ye,"dragstart","onDragStart"))},this.endDrag=function(t){Me(t,!0)},this.timeSinceDrag=function(){return ye.isDragging?0:(v()-xe)/1e3},this.hitTest=function(t,e){return fe.hitTest(ye.target,t,e)},this.applyBounds=function(t){var e,i;return t&&n.bounds!==t?(n.bounds=t,ye.update(!0)):(Pe(!0),Se(),C&&(e=ye.x,i=ye.y,C&&(e>L?e=L:N>e&&(e=N),i>I?i=I:X>i&&(i=X)),(ye.x!==e||ye.y!==i)&&(ye.x=ye.endX=e,ce?ye.endRotation=e:ye.y=ye.endY=i,q=!0,be())),ye)},this.update=function(t){var e=ye.x,i=ye.y;return t?ye.applyBounds():Pe(!0),ye.isPressed&&(e!==ye.x||i!==ye.y&&!ce)&&ke(),ye},this.enable=function(){var t;return ae(Te,"mousedown",Ae),ae(Te,"touchstart",Ae),ae(Te,"click",Le),ce||E(Te,"cursor",n.cursor||"move"),Te.ondragstart=Te.onselectstart=d,E(Te,"userSelect","none"),E(Te,"touchCallout","none"),E(Te,"touchAction","none"),r&&r.track(a||i,he?"x,y":ce?"rotation":"top,left"),a&&a.enable(),i._gsDragID=t="d"+x++,w[t]=this,a&&(a.element._gsDragID=t),e.set(i,{x:"+=0"}),this.update(),ye},this.disable=function(){var t=this.isDragging;return ce||E(Te,"cursor",null),e.killTweensOf(a||i,!0,we),Te.ondragstart=Te.onselectstart=null,E(Te,"userSelect","text"),E(Te,"touchCallout","default"),E(Te,"MSTouchAction","auto"),oe(Te,"mousedown",Ae),oe(Te,"touchstart",Ae),oe(Te,"click",Le),Z&&(oe(Z,"touchcancel",Me),oe(Z,"touchend",Me),oe(Z,"touchmove",Oe)),oe(c,"mouseup",Me),oe(c,"mousemove",Oe),r&&r.untrack(a||i,he?"x,y":ce?"rotation":"top,left"),a&&a.disable(),R(be),this.isDragging=this.isPressed=G=!1,t&&B(this,"dragend","onDragEnd"),ye},this.kill=function(){return ye.disable(),delete w[i._gsDragID],ye},-1!==se.indexOf("scroll")&&(a=this.scrollProxy=new pe(i,A({onKill:function(){ye.isPressed&&Me(null)}},n)),i.style.overflowY=ve&&!re?"auto":"hidden",i.style.overflowX=ge&&!re?"auto":"hidden",i=a.content),n.force3D!==!1&&e.set(i,{force3D:!0}),ce?we.rotation=1:(ge&&(we[de]=1),ve&&(we[me]=1)),ce?(F=u,U=F.css,F.overwrite=!1):he&&(F=ge&&ve?o:ge?h:l,U=F.css,F.overwrite=!1),this.enable()},de=fe.prototype=new t;de.constructor=fe,de.pointerX=de.pointerY=0,de.isDragging=de.isPressed=!1,fe.version="0.10.0",fe.zIndex=1e3,ae(c,"touchcancel",function(){}),ae(c,"contextmenu",function(){var t;for(t in w)w[t].isPressed&&w[t].endDrag()}),fe.create=function(t,i){"string"==typeof t&&(t=e.selector(t));for(var s=ie(t)?se(t):[t],r=s.length;--r>-1;)s[r]=new fe(s[r],i);return s},fe.get=function(t){return w[(M(t)||{})._gsDragID]},fe.timeSinceDrag=function(){return(v()-S)/1e3};var me=function(t,e){var i=t.pageX!==e?{left:t.pageX,top:t.pageY,right:t.pageX+1,bottom:t.pageY+1}:t.nodeType||t.left===e||t.top===e?M(t).getBoundingClientRect():t;return i.right===e&&i.width!==e?(i.right=i.left+i.width,i.bottom=i.top+i.height):i.width||(i.width=i.right-i.left,i.height=i.bottom-i.top),i};return fe.hitTest=function(t,e,i){if(t===e)return!1;var s,r,n,a=me(t),o=me(e),h=o.left>a.right||o.right<a.left||o.top>a.bottom||o.bottom<a.top;return h||!i?!h:(n=-1!==(i+"").indexOf("%"),i=parseFloat(i)||0,s={left:Math.max(a.left,o.left),top:Math.max(a.top,o.top)},s.width=Math.min(a.right,o.right)-s.left,s.height=Math.min(a.bottom,o.bottom)-s.top,0>s.width||0>s.height?!1:n?(i*=.01,r=s.width*s.height,r>=a.width*a.height*i||r>=o.width*o.height*i):s.width>i&&s.height>i)},fe},!0)}),window._gsDefine&&window._gsQueue.pop()();
});
