@extends('partials.layout')

@section('title')
    La resiliencia en la vida real
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <div class="card">

                <div class="card-head style-primary">
                    <header>La resiliencia en la vida real</header>
                </div>

                <div class="card-body">
                    <div id="componente-educativo">
                        <p>
                            Para que observes como la resiliencia está implicada en la vida real
                            y como en algunas situaciones las puede implementar revisa este video
                            “La Oveja Esquilada”.
                        </p>

                        <p>Para ver el video, presiona en el botón “CLICK AQUÍ”</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalv">CLICK AQUÍ</button>
                    </div>

                    <div id="componente-practico" style="display: none">
                        <form method="GET" action="{{ route('/aterrizando-el-concepto-resiliencia-4') }}">
                            <h4>Después de ver el video de “La Oveja Esquilada” </h4>

                            <textarea placeholder="¿Escribe qué elementos podrías rescatar del video acerca de la resiliencia?" cols="40" rows="10" style="width: 100%"></textarea>

                            <hr />
                            <div style="text-align: right">
                                <button class="btn btn-primary">Enviar respuesta</button>
                            </div>
                        </form>
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
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/zs5whN2QcGY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="evaluar()" data-dismiss="modal">Continuar</button>
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
            $('#componente-practico').show();
        }
    </script>

@endsection