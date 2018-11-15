@extends('partials.layout')

@section('title')
    Encuentra algo
@endsection

@section('addcss')
    <style>

    </style>

@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">

            <div class="card-head style-primary">
                <header>Encuentra algo</header>
            </div>

            <div class="card-body">

                <p>
                    Imagina a tu niño compartiendo en un contexto de socialización con pares tal como el que se presenta en el dibujo a continuacion,
                    identifica cuales comportamientos te gustaría que él mostrara con mayor frecuencia.
                    Enciérralos con un círculo. <i>"Desliza levemente el mouse para dibujar un círculo en la foto"</i>
                </p>

                <div style="text-align: center; width: 66%; margin: auto;">
                    <canvas id="myCanvas" width="500px" height="330px">
                       <!-- <img src="{{ asset('ActividadPapitoEscultor/003_collage.png') }}" /> -->
                    </canvas>
                    <br /><br />
                    <button class="btn btn-default" onclick="javascript:clearArea();return false;">Limpiar imagen</button>
                   <!-- Line width : <select id="selWidth">
                        <option value="1">1</option>
                        <option value="3">3</option>
                        <option value="5" selected="selected">5</option>
                        <option value="7">7</option>
                        <option value="9">9</option>
                        <option value="11">11</option>
                    </select>
                    Color : <select id="selColor">
                        <option value="black">black</option>
                        <option value="blue" selected="selected">blue</option>
                        <option value="red">red</option>
                        <option value="green">green</option>
                        <option value="yellow">yellow</option>
                        <option value="gray">gray</option>
                    </select>-->
                </div>

                <hr />

                <div style="text-align: right">
                    <form method="GET" action="{{route('/papito-escultor-4')}}">
                        <button type="submit" class="btn btn-primary">Aquí vamos!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('addjs')
    <script type="text/javascript">
        var mousePressed = false;
        var lastX, lastY;
        var ctx;
        var pinto = false;

        function initScripts() {
            ctx = document.getElementById('myCanvas').getContext("2d");

            $('#myCanvas').mousedown(function (e) {
                window.mousePressed = true;
                Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);
            });

            $('#myCanvas').mousemove(function (e) {
                if (window.mousePressed) {
                    Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
                }
            });

            $('#myCanvas').mouseup(function (e) {
                window.mousePressed = false;
            });
            $('#myCanvas').mouseleave(function (e) {
                window.mousePressed = false;
            });
        }

        function Draw(x, y, isDown) {
            if (isDown) {
                var color = "";

                if(x> 310 && x < 400 && y < 180 && y > 40){
                    color="orange";
                }
                else if(x < 211 && y < 180)
                {
                    color = "green";
                }else if(x > 211 && y < 180){
                    color = "green";
                }else if(x < 259 && y > 180){
                    color = "green";
                }else {
                    color = "orange";
                }
                window.ctx.beginPath();
                window.ctx.strokeStyle = color;
                window.ctx.lineWidth = 5;
                window.ctx.lineJoin = "round";
                window.ctx.moveTo(window.lastX, window.lastY);
                window.ctx.lineTo(x, y);
                window.ctx.closePath();
                window.ctx.stroke();

                pinto = true;

            }
            lastX = x; lastY = y;
        }

        function pintarImagen(){
            base_image = new Image();
            base_image.src = "{{ asset('ActividadPapitoEscultor/003_collage.png') }}";
            base_image.onload = function () {
                window.ctx.drawImage(base_image,40,40);
            }
        }

        function clearArea() {
            // Use the identity matrix while clearing the canvas
            window.ctx.setTransform(1, 0, 0, 1, 0, 0);
            window.ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);

            pintarImagen();
        }

        $(document).on('click', 'form button[type=submit]', function(e) {
            if (!pinto) {
                e.preventDefault(); //prevent the default action
                alert("Debes seguir las indicaciones para seguir avanzando");
            }
        });


        initScripts();
        pintarImagen();

    </script>
@endsection