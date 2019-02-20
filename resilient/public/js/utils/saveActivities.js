function guardarRespuestasPorArrayTextArea(preguntasArray){
    var textArea = $("textarea");
    var cont = 0;

    textArea.each(function () {
       var actual =  new objectoTextArea($(this));
       var valor = actual.getValue();
       var idPreguntaActual = preguntasArray[cont];

       var respuesta = new RespuestaAbierta(idPreguntaActual, valor);
       respuesta.guardarRespuesta();
       cont ++;
    });
}


function guardarRespuestaConcatenadaPorInputsyHermanos(idPregunta){
    var inputsClase = $("input").not(':input[type=button], :input[type=submit], :input[type=reset],input[name=_token]');
    var array = [];

    inputsClase.each(function () {
        actual = new objectoInput($(this));
        array.push(actual.getValueAndSibbling());
    });
    var datos = concatenarPorArray(array);

    var respuesta = new RespuestaAbierta(idPregunta, datos);
    respuesta.guardarRespuesta();
}

function guardarRespuestaConcatenadaPorInputs(idPregunta){
    var inputsClase = $(":input").not(':input[type=button],input[name=_token]');
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

    constructor(idPregunta)
    {
        this.idPregunta = idPregunta;
        this.formData = new FormData();
    }

    guardar(route){
        this.formData.append("idPregunta",this.idPregunta);

        $.ajax({
            url: route,
            data: this.formData,
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

        constructor(idPregunta, seleccionada){
        super(idPregunta);
        this.seleccionada = seleccionada;
        this.route = "/SavaActivityMulti";
    }

    guardarRespuesta(){
        this.formData.append("seleccionada",this.seleccionada);
        this.guardar(this.route)
    }

}

class RespuestaAbierta extends Respuesta {

    constructor(idPregunta, respuesta) {
        super(idPregunta);
        this.respuesta = respuesta;
        this.route = "/SaveActivityOpen";
    }

    guardarRespuesta(){
        this.formData.append("respuesta",this.respuesta);
        this.guardar(this.route)
    }

}
