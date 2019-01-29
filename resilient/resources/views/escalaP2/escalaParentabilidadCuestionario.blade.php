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
                    <header>Cuestionario Escala de parentalidad</header>
                </div>
                <div class="card-body floating-label">
                <b><h3>Instrucciones</h3></b>

                <div>
                    <p>La Escala de Parentalidad Positiva (E2P) es un cuestionario muy sencillo que puede contestarlo      
                    cualquier adulto responsable de la crianza de un niño o niña. Su objetivo es identificar aquellas     
                    prácticas que usted usa al relacionarse con su hijo, hija, niño o niña a su cargo. Por favor asegúrese     
                    de entender muy bien estas instrucciones antes de continuar.</p>

                    <p>En el cuestionario se presentan una serie de frases que describen situaciones de crianza.
                    Se le pide escoger entre 4 opciones: Casi Nunca, A veces, Casi Siempre y Siempre.</p>

                    <p><i>Si la afirmación es muy poco cierta o casi nunca ocurre, entonces marque la letra “C/N” (Casi Nunca).</i> </p>
                    <p><i>Si describe algo parcialmente cierto o que ocurre solo a veces, marque la letra “A/V” (A veces). </i></p>
                    <p><i>Si es una situación bastante más cierta o habitual, marque la letra “C/S” (Casi Siempre). </i></p>
                    <p><i>Si describe algo totalmente cierto o que ocurre todo el tiempo, marque la letra “S” (Siempre). </i></p>
                    <p>Existe una opción adicional en algunas frases, de "No Aplica", que se marca si su hijo/a no asiste a Sala Cuna o Jardín Infantil.
                    	Por ejemplo: si durante los últimos seis meses la afirmación: “Con mi hijo/a jugamos en las tardes” es algo que casi nunca realizan,
                    entonces marque la opción “C/N”; y si durante los últimos seis meses la afirmación: “Converso con mi hijo/a sobre sus preocupaciones” describe algo que ocurre sólo a veces, entonces marque la opción “A/V”.
                    Si usted no es el padre o madre del niño/a, asuma que donde dice “hijo” o “hija” se refiere al niño, niña o adolescente que usted está criando o cuidando. Recuerde marcar una sola opción en cada afirmación.
                    Conteste todas las preguntas del cuestionario. Por favor, conteste con la mayor sinceridad posible. No hay respuestas correctas o incorrectas; por ello, escoja la respuesta que mejor refleje su realidad.</p>
                </div>

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

<script>

    preventDoubleSubmit();

</script>

@endsection