<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EscalaEP2Acudiente;
use App\EscalaResilienciaEP2;
use App\RespuestaEP2;
use App\Cuidador; 

class EscalaEP2Controller extends Controller
{
     public function index()
    {
        return null; 
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
    public function store(Request $request, $id_usuario, $id_respuesta)
    {
        $interseccion = new EscalaEP2Acudiente();
        $escala = new EscalaResilienciaEP2();


        // datos escala puntajes 1,2,3,4


        dd($request);
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

}
