@extends('partials.layout')

@section('title')
NIÑOS RESILIENTES 2
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">

                <div class="card-head style-primary">
                    <header>NIÑOS RESILIENTES - Video</header>
                </div>

                <div class="card-body">
                    <div id="componente-educativo">
                        <p>
                            <b>Instrucción:</b> Detente por unos minutos y mira el siguiente video 
                        </p>

                        <p>Para ver el video, presiona en el botón “CLICK AQUÍ”</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalv">CLICK AQUÍ</button>
                    </div>
                </div>
        </div>
    </div>

    <div id="modalv" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" style="display: inline">La Oveja Esquilada</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/3LiRupHOecY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="modal-footer">
                    <a style="btn btn-flat btn-primary ink-reaction" href="">
                         <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Continuar</button>
                    </a>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('addjs')
    <script type="text/javascript">

        function evaluar() {
            $('#componente-educativo').hide();
        }
    </script>

@endsection