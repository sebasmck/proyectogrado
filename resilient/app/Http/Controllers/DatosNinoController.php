<?php

namespace App\Http\Controllers;

use App\AcudienteInfante;
use App\Helpers\DateHelper;
use App\Http\Controllers\Auth\RedireccionadorRolController;
use App\Infante;
use App\RelacionInfante;
use App\User;
use App\ActividadAsignada;
use App\Actividad;
use App\ActividadGrupo;
use App\GrupoPoblacional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $fechai = new \DateTime('now');
        $fechaf= date('Y-m-d', strtotime('+8 week', ($fechai->getTimestamp())));   
        $acudienteinfante = new AcudienteInfante();
        $acudienteinfante->Id_Acudiente = $user->cuidador->Id_Acudiente;
        $acudienteinfante->Id_Infante = $infante->Id_Infante;
        $acudienteinfante->Id_RelacionInfante = 1;
        $acudienteinfante->Fecha_Inicial = $fechai;
        $acudienteinfante->Fecha_Final = $fechaf;
        $acudienteinfante->save();
        $listaActividades = Actividad :: all();
             $actividadGrupo = DB::table('actividad_grupo')
                              ->join('grupo_poblacional', 'grupo_poblacional.Id_Grupo_Poblacional', '=', 'actividad_grupo.id_Grupo_Poblacional')
                              ->select('actividad_grupo.Id_Actividad')
                              ->get();  
         foreach ($actividadGrupo as $actividadG) 
          {  
            $actividadesAsignadas = new ActividadAsignada();        
             if( 2<= $infante->Edad_Infante &&  $infante->Edad_Infante <3)
             {
                $actividadesAsignadas->id_RelacionAcudienteInfante =  $acudienteinfante->id ;
                $actividadesAsignadas->id_Actividad = $actividadG->Id_Actividad ;
                $actividadesAsignadas->Estado_Actividad_Asignada = 1;
                $actividadesAsignadas->FechaInicial_Actividad_Asignada = $fechai ;
                $actividadesAsignadas->save();
             }
             else if(3<= $infante->Edad_Infante && $infante->Edad_Infante < 4 )
             {
                $actividadesAsignadas->id_RelacionAcudienteInfante =  $acudienteinfante->id ;
               
                $actividadesAsignadas->id_Actividad = $actividadG->Id_Actividad ;
               
                $actividadesAsignadas->Estado_Actividad_Asignada = 1;
                $actividadesAsignadas->FechaInicial_Actividad_Asignada = $fechai ;
                $actividadesAsignadas->save();
             }
             else if(4 <= $infante->Edad_Infante && $infante->Edad_Infante <= 5 )
             {
                $actividadesAsignadas->id_RelacionAcudienteInfante =  $acudienteinfante->id ;
                $actividadesAsignadas->id_Actividad  = $actividadG->Id_Actividad ;
                $actividadesAsignadas->Estado_Actividad_Asignada = 1;
                $actividadesAsignadas->FechaInicial_Actividad_Asignada = $fechai ;  
                $actividadesAsignadas->save(); 
             }
             
        }
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
