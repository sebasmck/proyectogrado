<?php

namespace App\Http\Controllers;

use App\AreaSociodemografica;
use App\Ciudad;
use App\Departamento;
use App\Http\Controllers\Auth\RedireccionadorRolController;
use App\NivelSocioeconomico;
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
        $departamentos = Departamento::all();
        $areasociodemografica = AreaSociodemografica::all();
        $nivelsocioeconomico = NivelSocioeconomico::all();

        $cuidador = auth()->user()->cuidador;

        return view('DataInput.Datos_Acudiente')
        ->with('cuidador', $cuidador)
        ->with('tipodoc', $tipodoc)
        ->with('relacion', $relacion)
        ->with('sexo', $sexo)
        ->with('estadocivil', $estadocivil)
        ->with('escolaridad', $escolaridad)
        ->with('ocupacion', $ocupacion)
        ->with('departamentos', $departamentos)
        ->with('areasociodemografica', $areasociodemografica)
        ->with('nivelsocioeconomico', $nivelsocioeconomico);
    }

    public function getCities(Request $request){
        $idDepartamento = $request->get('idDepartamento');
        $ciudades = Ciudad::where('Id_Departamento',$idDepartamento)->get();
        return $ciudades;
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

        $user = User::find(auth()->id());
        $cuidador = $user->cuidador;
        $fechaNacimiento = new \DateTime($req->input('FechaDeNacimiento'));
        $edadCronologica = getDiffDates($fechaNacimiento->getTimestamp());

        $cuidador->Id_Sexo = $req->input('Id_Sexo');
        $cuidador->Id_Area = $req->input('Id_Area');
        $cuidador->Id_NivelSocioEconomico = $req->input('Id_NivelSocioEconomico');
        $cuidador->FechaDeNacimiento = $fechaNacimiento;
        $cuidador->Id_EstadoCivil = $req->input('Id_EstadoCivil');
        $cuidador->Id_Escolaridad = $req->input('Id_Escolaridad');
        $cuidador->Id_Ocupacion = $req->input('Id_Ocupacion');
        $cuidador->Otro_Ocupacion = $req->input('Otro_Ocupacion');
        $cuidador->Otro_Escolaridad = $req->input('Otro_Escolaridad');
        $cuidador->Id_NivelSocioEconomico = $req->input('Id_NivelSocioEconomico');
        $cuidador->Id_Nacionalidad = 36; //nacionalidad Colombiana por defecto
        $cuidador->id_usuario = $user->id;
        $cuidador->Id_Ciudad = $req->input('Id_Ciudad');
        $cuidador->edad = $edadCronologica->y;


        $cuidador->save();
        $user->id_estado = 2; //REGISTRO_COMPLETO
        $user->save();

        return RedireccionadorRolController::redirectTo();
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
