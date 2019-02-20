function guardarRespuesta(id_pregunta, clase) { // si hay text area por favor indicar cada input o text area con una clase.
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