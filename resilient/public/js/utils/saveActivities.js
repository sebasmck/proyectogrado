function guardarRespuesta(id_pregunta, clase = null) { // si hay text area por favor indicar cada input o text area con una clase.
    var allInputs = $(":input"); // document.getElementsByTagName("input");

    var concatenado = "";

    if(clase == null)
    {
        allInputs.each(function( i ) {

            var actual = $(this);
            var entro = false;

            var tipoInput = actual.attr("type");
            var textoActual;
            switch (tipoInput) {
                case "text":{
                    textoActual = actual.val();
                    entro = true;
                    break;
                }
                case "radio":
                case "checkbox":{
                    if(actual.checked){
                       textoActual = actual.val();
                       entro = true;
                    }
                    break;
                }
            }
            if(textoActual !== undefined && entro){
                if(i === 0) {
                    concatenado = textoActual;
                } else {
                    concatenado = concatenado + ";" + textoActual;
                }
            }

        });


    }else{
        var inputsClase = $("."+clase);

        inputsClase.each(function( j ) {

            var inputClaseActual = $(this);
            var entro = false;

            var tipoInputClase = inputClaseActual.attr("type");
            var textoActualClase;
            switch (tipoInputClase) {
                case "text":{
                    textoActualClase = inputClaseActual.val();
                    entro = true;
                    break;
                }
                case "radio":
                case "checkbox":{
                    if(inputClaseActual.checked){
                        textoActualClase = inputClaseActual.val();
                        entro = true;
                    }
                    break;
                }
            }


            if(inputClaseActual.prop("tagName") == "TEXTAREA"){
                textoActualClase = inputClaseActual.val();
                entro = true;
            }

            if(textoActualClase !== undefined && entro) {
                if (j === 0) {
                    concatenado = textoActualClase;
                } else {
                    concatenado = concatenado + ";" + textoActualClase;
                }
            }

        });

    }
}

function guardarRespuestaConcatenadaPorInputsyHermanos(idPregunta){
    var inputsClase = $(":input").not(':input[type=button]');
    var array = [];

    inputsClase.each(function () {
        actual = new objectoInput($(this));
        array.push(actual.getValueAndSibbling());
    });
    var respuesta = concatenarPorArray(array);
    console.log(respuesta);
}

function guardarRespuestaConcatenadaPorInputs(idPregunta){
    var inputsClase = $(":input").not(':input[type=button]');
    var array = [];

    inputsClase.each(function () {
       actual = new objectoInput($(this));
       array.push(actual.getValue());
    });
    var respuesta = concatenarPorArray(array);
}

function guardarRespuestaConcatenadaPorClase(idPregunta, clase){
    var objectClase = $("."+clase);
    var array = [];

    objectClase.each(function () {
        actual = new objectoDom($(this));
        array.push(actual.getValue());
    });
    var respuesta = concatenarPorArray(array);
}

function concatenarPorArray(array){
    var OPERADOR_CONCATENACION = ";";
    var valor = "";
    array.reduce(function(valorAnterior, valorActual){

        if(valorAnterior === ""){
            return valorAnterior + valorActual;
        }
        else if(valorActual === "")
        {
            return valorAnterior;
        }else
        {
            valor = valorAnterior + OPERADOR_CONCATENACION + valorActual;
            return valor;
        }
    });
    return valor;
}

class objectoDom {
    constructor(objDom){
        this.objDom = objDom;
    }

    getValue(){
        var value = "";
        switch (this.objDom.prop) {
            case "INPUT":{
                var objInput = new objectoInput(this.objDom);
                value = objInput.getValue();
                break;
            }
            case "TEXTAREA":{
                var objTextArea = new objectoTextArea(this.objDom);
                value = objTextArea.getValue();
                break;
            }
        }
        return value;
    };
}

class objectoTextArea extends objectoDom {
    constructor(objDom){
        super(objDom);
    }

    getValue(){
        return this.objDom.val();
    }
}

class objectoInput extends objectoDom {
    constructor(objDom){
        super(objDom);
    }

    getValue(){
        var value = "";
        switch (this.objDom.attr("type")) {
            case "text":{
                value = this.objDom.val();
                break;
            }
            case "radio":
            case "checkbox":{
                if(this.objDom.checked){
                    value = this.objDom.val();
                }
                break;
            }
        }

        return value;
    }

    getValueAndSibbling(){
        return this.objDom.prev().text()+ "-" + this.getValue();
    }
}


class Respuesta {

    constructor(idPregunta, idAcudienteInfante)
    {
        this.idPregunta = idPregunta;
        this.idAcudienteInfante = idAcudienteInfante;
        this.formData = new FormData();
    }

    guardar(route){
        this.formData.append("idPregunta",this.idPregunta);
        this.formData.append("idAcudienteInfante",this.idAcudienteInfante);

        $.ajax({
            url: "{{ route('"+route+"') }}",
            data: formData,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
        });
    };

}

class RespuestaMultiple extends Respuesta {

        constructor(idPregunta, idAcudienteInfante, seleccionada){
        super(idPregunta, idAcudienteInfante);
        this.seleccionada = seleccionada;
        this.route = "";
    }

    guardarRespuesta(){
        this.formData.append("seleccionada",this.seleccionada);
        this.guardar(this.route)
    }

}

class RespuestaAbierta extends Respuesta {

    constructor(idPregunta, idAcudienteInfante, respuesta) {
        super(idPregunta, idAcudienteInfante);
        this.respuesta = respuesta;
        this.route = "";
    }

    guardarRespuesta(){
        this.formData.append("respuesta",this.respuesta);
        this.guardar(this.route)
    }

}



function guardarRespuestaConComodin(id_pregunta, clase, claseLabel) {
    var allInputs = $(":input"); // document.getElementsByTagName("input");

    var concatenado = "";

    if(clase == null)
    {
        allInputs.each(function( i ) {

            var actual = $(this);
            var entro = false;

            var tipoInput = actual.attr("type");
            var textoActual;
            switch (tipoInput) {
                case "text":{
                    textoActual = actual.val();
                    entro = true;
                    break;
                }
                case "radio":
                case "checkbox":{
                    if(actual.checked){
                        textoActual = actual.val();
                        entro = true;
                    }
                    break;
                }
            }
            if(textoActual !== undefined && entro){
                if(i === 0) {
                    concatenado = textoActual;
                } else {
                    concatenado = concatenado + ";" + textoActual;
                }
            }

        });
        console.log(concatenado)

    }else{
        var inputsClase = $("."+clase);

        inputsClase.each(function( j ) {

            var inputClaseActual = $(this);
            var entro = false;

            var tipoInputClase = inputClaseActual.attr("type");
            var textoActualClase;
            switch (tipoInputClase) {
                case "text":{
                    textoActualClase = inputClaseActual.val();
                    entro = true;
                    break;
                }
                case "radio":
                case "checkbox":{
                    if(inputClaseActual.checked){
                        textoActualClase = inputClaseActual.val();
                        entro = true;
                    }
                    break;
                }
            }


            if(inputClaseActual.prop("tagName") == "TEXTAREA"){
                textoActualClase = inputClaseActual.val();
                entro = true;
            }

            if(textoActualClase !== undefined && entro) {
                if (j === 0) {
                    concatenado = textoActualClase;
                } else {
                    concatenado = concatenado + ";" + textoActualClase;
                }
            }

        });

    }
}