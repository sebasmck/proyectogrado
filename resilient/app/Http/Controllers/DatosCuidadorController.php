<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuidador;
use App\TipoDoc;
use App\RelacionInfante;
use App\Sexo;
use App\EstadoCivil;
use App\Escolaridad;
use App\Ocupacion;

use App\User;

class DatosCuidadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tipodoc = TipoDoc::all();
        $relacion = RelacionInfante::all();
        $sexo = Sexo::all();
        $estadocivil = EstadoCivil::all();
        $escolaridad = Escolaridad::all();
        $ocupacion = Ocupacion::all();

        return view('DataInput.Datos_Acudiente')
        ->with('tipodoc', $tipodoc)
        ->with('relacion', $relacion)
        ->with('sexo', $sexo)
        ->with('estadocivil', $estadocivil)
        ->with('escolaridad', $escolaridad)
        ->with('ocupacion', $ocupacion);
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
    public function store(Request $req)
    {

        $cuidador = new Cuidador;
        $user = new User;

        $cuidador->Nombre_Acudiente = $req->input('Nombre_Acudiente');
        $cuidador->Apellido_Acudiente = $req->input('Apellido_Acudiente');
        $cuidador->Correo_Acudiente = $req->input('Correo_Acudiente');
        $cuidador->Id_TipoDocumento = $req->input('Id_TipoDocumento');
        $cuidador->NumeroDocumento_Acudiente = $req->input('NumeroDocumento_Acudiente');
        $cuidador->Id_RelacionInfante = $req->input('Id_RelacionInfante');
        $cuidador->OtroRelacionInfante = $req->input('OtroRelacionInfante');
        
        // checkboxes
        $cuidador->Padre = $req->input('Padre');
        $cuidador->Madre = $req->input('Madre');
        $cuidador->Abuelo = $req->input('Abuelo');
        $cuidador->Hermano = $req->input('Hermano');
        $cuidador->Tio = $req->input('Tio');
        $cuidador->Otro_Cuidador = $req->input('Otro_Cuidador');

        // 
        $cuidador->Id_Sexo = $req->input('Id_Sexo');
        $cuidador->FechaDeNacimiento = $req->input('FechaDeNacimiento');
        $cuidador->Id_EstadoCivil = $req->input('Id_EstadoCivil');
        $cuidador->Id_Escolaridad = $req->input('Id_Escolaridad');
        $cuidador->Otro_Escolaridad = $req->input('Otro_Escolaridad');
        $cuidador->Id_Ocupacion = $req->input('Id_Ocupacion');
        $cuidador->Otro_Ocupacion = $req->input('Otro_Ocupacion');

        $cuidador->Id_Area = $req->input('');
        $cuidador->Id_NivelSocioEconomico = $req->input('');
        
        
        $cuidador->Id_Ciudad = $req->input('');

        $cuidador->save();



        return redirect()->route('');
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
