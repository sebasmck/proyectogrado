<?php

namespace App\Http\Controllers\CustomControllers;

use App\EscalaEP2DatosAnexos;
use App\EscalaEP2DatosAnexosNino;
use App\EscalaEP2Enunciado;
use App\EscalaEP2Respuesta;
use Illuminate\Http\Request;
use App\Cuidador;
use App\Http\Controllers\Controller;

class EscalaEP2Controller extends Controller
{
     public function index()
     {
        return view('escalaP2.escalaParentabilidad');
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
        $data = array();
        $puntos = 0;

        // obtener los datos de la encuesta
        for ($i=0; $i < 54; $i++) {
            if($request->exists('pregunta'.($i+1)))
            {
                $respuestaActual = $request->input('pregunta' . ($i + 1));
                $respuestaNueva = array('id_EscalaDatosAnexosNino' => $idEscalaDatosAnexosNino,
                                        'Id_Respuesta' => $respuestaActual,
                                        'id_EnunciadoEP2' => ($i+1));
                $puntos = $puntos + $respuestaActual;

                array_push($data, $respuestaNueva);
            }
        }

        // actualizar los puntos en la tabla padre
        $datosAnexosNino = EscalaEP2DatosAnexosNino::find($idEscalaDatosAnexosNino);
        $datosAnexosNino->puntos = $puntos;
        $datosAnexosNino->save();

        $rtaCargado = EscalaEP2Respuesta::insert($data);

        return $request;
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

        $datosAnexos->save();

        $datosAnexosNino = new EscalaEP2DatosAnexosNino();

        $datosAnexosNino->id_infante = $request->input('id-infante');
        $datosAnexosNino->discapacidad_nino = $request->input('discapacidad-descripcion');
        $datosAnexosNino->problema_nino = $request->input('emocional-descripcion');
        $datosAnexosNino->idescalaresilienciaep2_datosAnexo = $datosAnexos->id;

        $datosAnexosNino->save();

        return $this->irACuestionario( $datosAnexosNino->id_infante, $datosAnexosNino->id);
    }

}
