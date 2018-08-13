@extends('partials.layout')

@section('title')
    Escala
@endsection

@section('content')

    <div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{ route('/guardar-escalap2-cuestionario') }}">
            @csrf            
            <div class="card">
                <div class="card-head style-primary">
                    <header>Cuestionario Escala de parentabilidad</header>
                </div>
                <div class="card-body floating-label">

                <input type="hidden" name="id-infante" value="{{ $idInfante }}">
                <input type="hidden" name="id-escala-datos-anexos" value="{{ $idEscalaDatosAnexosNino }}">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col" class="col-md-7">Pregunta</th>
                                <th scope="col" class="col-md-1"></th>
                                <th scope="col" class="col-md-1">Casi nunca</th>
                                <th scope="col" class="col-md-1">Aveces</th>
                                <th scope="col" class="col-md-1">Casi siempre</th>
                                <th scope="col" class="col-md-1">Siempre</th>
                            </tr>
                        </thead>
                        <tbody>
                        @for ($i = 0; $i < sizeof($preguntasCuestionario); $i++)
                            <tr>
                              
                                    <th> {{ ($i+1) }}. </th>
                                    <?php
                                    if($i == 28| $i == 29 ){
                                        echo('<td>'.$preguntasCuestionario[$i].'</td>');
                                            echo('<td >
                                                <label class="radio-inline radio-styled">
                                                    <input type="radio" name='."pregunta".($i+1).' value="4"><span>No aplica</span>
                                                </label>
                                          </td>');
                                        }else{
                                            echo('<td colspan="2">'.$preguntasCuestionario[$i].'</td>');
                                        }
                                    ?>
                                    <td>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="{{ 'pregunta'.($i+1) }}" value="1" required="true"><span>C/N</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="{{ 'pregunta'.($i+1) }}" value="2"><span>A/V</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="{{ 'pregunta'.($i+1) }}" value="3"><span>C/S</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="{{ 'pregunta'.($i+1) }}" value="4"><span>S</span>
                                        </label>
                                    </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Enviar</button>
                            </div>
                        </div>
                </div>
            </div>
        </form>
    </div>


@endsection

@section('addjs')





@endsection