@extends('partials.layout')

@section('title')
    Yo y mi manera de ser
@endsection


@section('addcss')

    <style>

        .ballon-text {
            position: absolute;
            top: 60px;
            margin-left: 10px;
            width: 120px;
            color: white;
            border: 2px lightskyblue solid;
            font-size: 1.2em;
            background-color: #0aa89e;
        }

        .ballon-img {
            position: absolute;
            width: 140px;
            height: 160px;
            z-index: -1;
        }

        .ballon{
            margin-left: 200px;
            position: absolute;
            z-index: 1;
        }
    </style>
@endsection

@section('content')

    <div class="col-lg-offset-1 col-md-10 margin-bottom-lg">
        <div class="card">

            <div class="card-head style-primary">
                <header>Yo y mi manera de ser</header>
            </div>

            <div class="card-body" style=" height: 600px;">
                <p>
                    Cuáles son las técnicas que cómo cuidador utilizo para conseguir moldear el comportamiento de mi niño.
                    <i>"Rompe los globos dando click en cada uno,Los globos contienen las técnicas que utilizas"</i>
                </p>
            </div>

            <div class="card-footer" style="padding: 15px; background-color: lightskyblue;">
                <div style="text-align: right; margin-right: 10px">
                    <a href=" {{route('/papito-escultor-5')}} ">
                        <button type="button" class="btn btn-primary">Siguiente</button>
                    </a>
                </div>
                <div style="text-align: left; display: inline">
                    <a href='https://www.freepik.es/fotos-vectores-gratis/cumpleanos'>Vector de cumpleaños creado por vectorpocket - www.freepik.es</a>
                </div>
            </div>
        </div>
    </div>


    <div id="ballons-container" class="col-lg-offset-2 col-sm-8" style="display: flex; left: 50px">

    </div>



@endsection

@section('addjs')

    <script type="text/javascript">
        var listaTecnicas = ["Acusaciones","Ordenes","Amenazas","Sermones","Advertencias","Comparaciones","Sarcasmos","Profecías"];
        var globos = ["004_blue_ballon.png","008_yellow_ballon.png","006_green_ballon.png","007_red_ballon.png"]

         function executeScript(){

            var length = 0;
            var contador = 1;
            var leftspace = 0;

           listaTecnicas.forEach(element => {
               length = length + 2;

               var globoNumber =  Math.round(Math.random()*3);
               var count = Math.round(Math.random()*2);
               var nuevoDiv = "<div id='ballon"+contador+"' class='ballon' style='margin-left:"+length+"px'><div class='ballon-text' style='left:"+leftspace+"px'>"+element+"</div><img id='ballon-img-"+contador+"' class='ballon-img' style='left:"+leftspace+"px' src=' {{ asset("ActividadPapitoEscultor") }}/"+globos[globoNumber]+"' /></div>";
               leftspace  = leftspace + 140;
               var ballonId = contador;
               setTimeout( function(){
                   executeAfter(nuevoDiv);
               } , (count * 1000))

               setTimeout(function () {
                   animateAfter();
               }, 2000)

               contador ++;
           })
         }

         function executeAfter( nuevoDiv){
             var htmlOld = $("#ballons-container").html();
             $("#ballons-container").html(htmlOld+nuevoDiv);
         }

         function animateAfter(){

             var velocity =  (Math.round(Math.random()*10)*5) +100;

             $("#ballon"+1).animate({ bottom: "+="+velocity },3000);
             velocity =  (Math.round(Math.random()*10)*20) +100;
             $("#ballon"+2).animate({ bottom: "+="+velocity },3000);
             velocity =  (Math.round(Math.random()*10)*20) +100;
             $("#ballon"+3).animate({ bottom: "+="+velocity },3000);
             velocity =  (Math.round(Math.random()*10)*20) +100;
             $("#ballon"+4).animate({ bottom: "+="+velocity },3000);
             velocity =  (Math.round(Math.random()*10)*20) +100;
             $("#ballon"+5).animate({ bottom: "+="+velocity },3000);
             velocity =  (Math.round(Math.random()*10)*20) +100;
             $("#ballon"+6).animate({ bottom: "+="+velocity },3000);
             velocity =  (Math.round(Math.random()*10)*20) +100;
             $("#ballon"+7).animate({ bottom: "+="+velocity },3000);
             velocity =  (Math.round(Math.random()*10)*20) +100;
             $("#ballon"+8).animate({ bottom: "+="+velocity },3000);
             velocity =  (Math.round(Math.random()*10)*20) +100;
             $("#ballon"+9).animate({ bottom: "+="+velocity },3000);
             setTimeout(function () {
               for (var i= 1 ; i < 10; i++){
                   $("#ballon"+i).stop();
               }
             },8000)
         }

         $("#ballons-container").click(function (event) {
             var target = event.target;
             console.log(target);
             $("#"+target.id).parent().fadeOut();
         });

         executeScript();
    </script>
@endsection