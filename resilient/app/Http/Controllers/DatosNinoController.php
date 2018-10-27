<?php

namespace App\Http\Controllers;

use App\AcudienteInfante;
use App\Helpers\DateHelper;
use App\Http\Controllers\Auth\RedireccionadorRolController;
use App\Infante;
use App\RelacionInfante;
use App\User;
use Illuminate\Http\Request;

class DatosNinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('DataInput.Datos_Nino');
    }


    public function datosnino2(){
        return view ('DataInput.Datos_Comportamientos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        $infante = new Infante();

        $infante->Nombre_Infante = $request->input("firstname");
        $infante->Apellido_Infante = $request->input("lastname");
        $infante->FechaDeNacimiento_Infante =  new \DateTime($request->input("fechanacimiento"));
        $infante->Edad_Infante = $request->input("edad");
        $infante->Id_Sexo = $request->input("sexo");

        $infante->save();

        $user = User::find(auth()->id());

        $acudienteinfante = new AcudienteInfante();
        $acudienteinfante->Id_Acudiente = $user->cuidador->Id_Acudiente;
        $acudienteinfante->Id_Infante = $infante->Id_Infante;
        $acudienteinfante->Id_RelacionInfante = 1;

        $acudienteinfante->save();

        return $this->datosnino2();
    }

    public function storeSecond(){

        $user = User::find(auth()->id());
        $user->id_estado = 3;
        $user->save();

       return  RedireccionadorRolController::redirectTo();
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
        //
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
