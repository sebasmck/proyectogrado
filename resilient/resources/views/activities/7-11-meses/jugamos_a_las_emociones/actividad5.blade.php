@extends('partials.layout')

@section('title')
    ¿Jugamos a las emociones?
@endsection

@section('addcss')

    <style>
        #wrapper
        {
            text-align:center;
            margin:0 auto;
            padding:0px;
            width:100%px;
        }

        #drop-area
        {
            width:100%;
            height:200px;
            background-color:white;
            border:3px dashed lightskyblue;
        }
        .drop-text
        {
            margin-top:70px;
            color:grey;
            font-size:25px;
            font-weight:bold;
        }
        #drop-area img
        {
            max-width:200px;
        }
    </style>
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">
            <div class="card-head style-accent-dark">
                    <header>Actividad 5</header>
                </div>

                <div class="card-body">

                    <p style="font-size: 1.2em">
                        <b>Instrucciones:</b>
                    </p>

                    <p style="font-size: 1.2em">
                        En esta actividad vas a tomarle una foto a tu hijo/a cuando está enojado, triste o alegre, y le vas a mostrar su rostro diciéndole “Tú está enojado aquí cierto?” “Quién está feliz aquí”,
                        ayudando a que identifique que esa persona de la foto es le y la emociones que estaba teniendo. Después vas a subir una foto de tu hijo/a con cada una de las emociones.
                    </p>


                        <div id="wrapper">
                            <input type="file">
                            <div id="drop-area">
                                <h3 class="drop-text">Pegue las imagenes en orden aquí</h3>
                            </div>
                        </div>

                    <hr />
                    <div class="row" align="center">
                        <div class="col-md-4">
                            <div>
                                <img id="primeraImagen" style="max-width: 300px; max-height: 200px">
                            </div>
                            <p>Alegría</p>
                        </div>
                        <div class="col-md-4">
                           <div><img id="segundaImagen" style="max-width: 300px; max-height: 200px"></div>
                            <p>Tristeza</p>
                        </div>
                        <div class="col-md-4">
                            <div><img id="terceraImagen" style="max-width: 300px; max-height: 200px"></div>
                            <p>Enojo</p>
                        </div>
                    </div>


                    <hr />

                    <div style="text-align: right">
                                <button id="nextStage" class="btn btn-accent-light">
                                <a href="{{ route("/jugamos-a-las-emociones-7") }}">
                                    COMPLETADO
                                </a>
                            </button>
                    </div>
                </div>
        </div>
    </div>


@endsection


@section("addjs")

    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#drop-area").on('dragenter', function (e){
                e.preventDefault();
                $(this).css('background', 'lightskyblue');
            });

            $("#drop-area").on('dragover', function (e){
                e.preventDefault();
            });

            $("#drop-area").on('drop', function (e){
                $(this).css('background', '#1e8adf');
                e.preventDefault();
                var image = e.originalEvent.dataTransfer.files;
                createFormData(image);
            });
        });

        function createFormData(image)
        {
            var formImage = new FormData();
            formImage.append('userImage', image[0]);
            uploadFormData(formImage);
        }

        var primera = null;
        var segunda = null;
        var tercera = null;

        function uploadFormData(formData)
        {
            $.ajax({
                url: "{{ route('/jugamos-a-las-emociones-11') }}",
                data: formData,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                success: function(data){
                    // FileReader support
                    if (FileReader){
                        var fr = new FileReader();
                        fr.onload = function () {

                            if(primera == null){
                                $("#primeraImagen").attr("src",fr.result);
                                primera = 1;
                            }else if(segunda == null){
                                $("#segundaImagen").attr("src",fr.result);
                                segunda = 1;
                            }else if(tercera ==null){
                                $("#terceraImagen").attr("src",fr.result);
                                tercera = 1;
                            }

                        };
                        fr.readAsDataURL(formData.get("userImage"));
                    }
                    $('#drop-area').html();
                }});
        }
    </script>
    @endsection
