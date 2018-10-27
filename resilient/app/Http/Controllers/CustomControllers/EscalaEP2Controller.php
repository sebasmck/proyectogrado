<?php

namespace App\Http\Controllers\CustomControllers;

use App\EscalaEP2DatosAnexos;
use App\EscalaEP2DatosAnexosNino;
use App\EscalaEP2DetalleCalificacion;
use App\EscalaEP2Enunciado;
use App\EscalaEP2Respuesta;
use App\EscalaEP2Calificacion;
use App\EscalaEP2Competencia;
use App\EscalaEP2RubricaCalificacion;
use App\EscalaEP2Zona;
use App\Http\Controllers\Auth\RedireccionadorRolController;
use App\User;
use Illuminate\Http\Request;
use App\Cuidador;
use App\Infante;
use App\AcudienteInfante;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EscalaEP2Controller extends Controller
{
     public function escalaEp2ByNino($idInfante)
     {
         $id_usuario = auth()->id();
         $acudiente = Cuidador::where('id_usuario', $id_usuario)->with('sexo','escolaridad','ocupacion','estadoCivil','nacionalidad')->get();
         if(array_has($acudiente,'0')){
            $acudiente = $acudiente[0];
         }

        $acudiente_infante = AcudienteInfante::where('Id_Acudiente',$acudiente->Id_Acudiente)->where('Id_Infante',$idInfante)->get();

        if(array_has($acudiente_infante,'0')){
            $acudiente_infante = $acudiente_infante[0];
        }

         $acudiente_infante->relacionInfante;

        $infante = Infante::find($idInfante);

        $differenceDates = getDiffDates($infante->FechaDeNacimiento_Infante);
        
        return view('escalaP2.escalaParentabilidad', ['acudiente' => $acudiente,'infante' => $infante,'acudienteInfante' => $acudiente_infante
        ,'infante_edad' => $differenceDates]);
      return $acudiente;
     }

     public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarEscala(Request $request)
    {
        $idEscalaDatosAnexosNino = $request->input('id-escala-datos-anexos');
        $escalaRespuestas = EscalaEP2Respuesta::where('id_EscalaDatosAnexosNino', $idEscalaDatosAnexosNino)->first();

        if( !$escalaRespuestas ) {
        $data = array();
        $puntos = 0;
            // obtener los datos de la encuesta
            for ($i = 0; $i < 54; $i++) {
                if ($request->exists('pregunta' . ($i + 1))) {
                    $respuestaActual = $request->input('pregunta' . ($i + 1));
                    $respuestaNueva = array('id_EscalaDatosAnexosNino' => $idEscalaDatosAnexosNino,
                        'Id_Respuesta' => $respuestaActual,
                        'id_EnunciadoEP2' => ($i + 1));
                    $puntos = $puntos + $respuestaActual;

                    array_push($data, $respuestaNueva);
                }
            }

            EscalaEP2Respuesta::insert($data);

            $result = DB::select("SELECT SUM(a.Id_Respuesta) 
              AS 'sumaCompetencia', b.id_competenciaep2 AS 'competencia' FROM escalaresilienciaep2_respuesta a, enunciadoep2 b WHERE (a.id_EnunciadoEP2 = b.id_EnunciadoEP2)AND a.id_EscalaDatosAnexosNino = ? GROUP BY (b.id_competenciaep2)"
                , [$idEscalaDatosAnexosNino]);

            $competencias = EscalaEP2Competencia::all();

            foreach ($competencias as $competencia) {
                $encontrado = false;
                foreach ($result as $resultadoCompetencia) {
                    if ($competencia->id == $resultadoCompetencia->competencia) {
                        $encontrado = true;
                        $detalleCalificacion = new EscalaEP2DetalleCalificacion();

                        $rubricaBuscada = EscalaEP2RubricaCalificacion::where('id_competenciaep2', $competencia->id)
                            ->where('puntajeMinimo_calificacionep2', '<=', $resultadoCompetencia->sumaCompetencia)
                            ->where('puntajeMaximo_calificacionep2', '>=', $resultadoCompetencia->sumaCompetencia)
                            ->get();

                        if (array_has($rubricaBuscada, '0')) {
                            $rubricaBuscada = $rubricaBuscada[0];
                        }

                        $detalleCalificacion->id_datosAnexosNino = $idEscalaDatosAnexosNino;
                        $detalleCalificacion->id_rubricaCalificacionEp2 = $rubricaBuscada->id;
                        $detalleCalificacion->puntaje_detallecalificacionep2 = $resultadoCompetencia->sumaCompetencia;

                        $detalleCalificacion->save();

                    }
                }

                if (!$encontrado) {
                    $detalleCalificacion = new EscalaEP2DetalleCalificacion();

                    $detalleCalificacion->id_datosAnexosNino = $idEscalaDatosAnexosNino;

                    $rubricaBuscada = EscalaEP2RubricaCalificacion::where('id_competenciaep2', $competencia->id)
                        ->where('puntajeMinimo_calificacionep2', '<=', $puntos)
                        ->where('puntajeMaximo_calificacionep2', '>=', $puntos)
                        ->get();
                    if (array_has($rubricaBuscada, '0')) {
                        $rubricaBuscada = $rubricaBuscada[0];
                    }
                    $detalleCalificacion->id_rubricaCalificacionEp2 = $rubricaBuscada->id;
                    $detalleCalificacion->puntaje_detallecalificacionep2 = $puntos;

                    $detalleCalificacion->save();
                }
            }
            return $this->goResultadosEscala($idEscalaDatosAnexosNino);
        }else{
            return $this->goResultadosEscala($idEscalaDatosAnexosNino);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function irACuestionario( $idInfante, $idEscalaDatosAnexosNino ) {
        $preguntasCuestionario = EscalaEP2Enunciado::all();
        $preguntasData = array();
        foreach($preguntasCuestionario as $preguntaActual)
        {
            array_push($preguntasData, $preguntaActual->Pregunta_EnunciadoEP2);
        }
        
       $data = ['preguntasCuestionario' => $preguntasData,
                'idInfante' => $idInfante,
                'idEscalaDatosAnexosNino' => $idEscalaDatosAnexosNino];

       return view('escalaP2.escalaParentabilidadCuestionario',$data);
    }


    public function actualizarDatosAnexosEscalaEP2(Request $request){

        $datosAnexos = new EscalaEP2DatosAnexos();

        $id_usuario = auth()->id();
        $acudiente = Cuidador::where('id_usuario', $id_usuario)->get()[0];

        $datosAnexos->id_acudiente_cuidador = $acudiente->Id_Acudiente;
        $datosAnexos->ingreso_familiar = $request->input('ingreso-familiar') ;
        $datosAnexos->total_personas_vec = $request->input('habitantes');
        $datosAnexos->total_personas_m18 = $request->input('habitantes18');
        $datosAnexos->numero_hijos = $request->input('hijos');
        $datosAnexos->edad = $request->has('edad')?$request->input('edad'):$acudiente->edad;

        $datosAnexos->save();

        $datosAnexosNino = new EscalaEP2DatosAnexosNino();

        $datosAnexosNino->id_infante = $request->input('id-infante');
        $datosAnexosNino->discapacidad_nino = $request->input('discapacidad-descripcion');
        $datosAnexosNino->problema_nino = $request->input('emocional-descripcion');
        $datosAnexosNino->idescalaresilienciaep2_datosAnexo = $datosAnexos->id;

        $datosAnexosNino->save();

        return $this->irACuestionario( $datosAnexosNino->id_infante, $datosAnexosNino->id);
    }

    public function goResultadosEscala($idEscalaDatosAnexosNino){

        $zonas = EscalaEP2Zona::all();
        $competencias = EscalaEP2Competencia::all();
        $detalleCalificacion = EscalaEP2DetalleCalificacion::where('id_datosAnexosNino',$idEscalaDatosAnexosNino)->with('rubrica.zona','rubrica.competencia')->get();

       return view('escalaP2.escalaParentabilidadResultado',
           ['zonas' => $zonas,
            'competencias' => $competencias,
            'detalleCalificacion' => $detalleCalificacion]);

    }

    public function finalizarEscala(){
        $user = User::find(auth()->id());
        $user->id_estado = 6;
        $user->save();

        return RedireccionadorRolController::redirectTo();
    }

}
