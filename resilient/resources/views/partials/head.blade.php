<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Resilient | @yield('title')</title>

	<!-- Styles -->
	{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

	<link rel="stylesheet" href="">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

	<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/bootstrap.css?1422792965')}}" />
	
	<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/materialadmin.css?1425466319')}}" />
		
		<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/font-awesome.min.css?1422529194')}}" />
		
		<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/material-design-iconic-font.min.css?1421434286')}}" />
		
		<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/libs/rickshaw/rickshaw.css?1422792967')}}" />
		
		<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/libs/morris/morris.core.css?1420463396')}}" />

		<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989')}}" />

		<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990')}}" />

		<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990')}}" />

		<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/libs/dropzone/dropzone-theme.css?1424887864')}}" />
		
		<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/libs/select2/select2.css?1424887856')}}" />

		<link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/libs/nestable/nestable.css?1423393667')}}" />
		


	@yield('addcss')

</head>