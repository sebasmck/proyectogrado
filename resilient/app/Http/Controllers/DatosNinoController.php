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
        $relacion = RelacionInfante::all();

        return view('DataInput.Datos_Nino')->with('relacion',$relacion);
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
    public function store(Request $req)
    {
        $infante = new Infante();
        $infante->Id_Infante = $req->input('Id_Infante');
        $infante->Nombre_Infante = $req->input('Nombre_Infante');
        $infante->Apellido_Infante = $req->input('Apellido_Infante');
        $infante->Id_Sexo = $req->input('Id_Sexo');
        $infante->FechaDeNacimiento_Infante = new \DateTime($req->input('FechaDeNacimiento_Infante'));

        $infante->Id_SistemaDeSalud = $req->input('Id_SistemaDeSalud');
        $infante->Id_NivelEducativo = $req->input('Id_NivelEducativo');
        $infante->OtroViveInfante = $req->input('OtroViveInfante');
        $infante->Id_VinculoPadre = $req->input('Id_VinculoPadre');
        $infante->Otro_VinculoPadre = $req->input('Otro_VinculoPadre');
        $infante->Embarazo_Planeado = $req->input('Embarazo_Planeado');
        $infante->Edad_MadreEmbarazo = $req->input('Edad_MadreEmbarazo');
        $infante->Madre_Medicamento = $req->input('Madre_Medicamento');
        $infante->Edad_Gestacional = $req->input('Edad_Gestacional');
        $infante->Complicaciones_Parto = $req->input('Complicaciones_Parto');
        $infante->Otro_Complicaciones_Parto = $req->input('Otro_Complicaciones_Parto');
        $infante->Id_DificultadEmbarazo = $req->input('Id_DificultadEmbarazo');
        $infante->Otro_DificultadEmbarazo = $req->input('Otro_DificultadEmbarazo');
        $infante->Id_TipoParto = $req->input('Id_TipoParto');
        $infante->Dificultades_Parto = $req->input('Dificultades_Parto');
        $infante->Otro_Dificultadoes_Parto = $req->input('Otro_Dificultadoes_Parto');
        $infante->Id_DificultadPostParto = $req->input('Id_DificultadPostParto');
        $infante->Otro_DificultadoesPostParto = $req->input('Otro_DificultadoesPostParto');
        $infante->Padre = $req->input('Padre')?$req->input('Padre'):0;
        $infante->Madre = $req->input('Madre')?$req->input('Madre'):0;
        $infante->Abuelo = $req->input('Abuelo')?$req->input('Abuelo'):0;
        $infante->Tio = $req->input('Tio')?$req->input('Tio'):0;
        $infante->Hermano = $req->input('Hermano')?$req->input('Hermano'):0;
        $infante->Otro_Cuidador = $req->input('Otro_Cuidador');


        $fechanacimiento = new \DateTime($req->input('FechaDeNacimiento_Infante'));
        $diferenceDate = getDiffDates($fechanacimiento->getTimestamp());
        $infante->Edad_Infante = $diferenceDate->y;

        $infante->save();

        $user = User::find(auth()->id());
        $fechai = new \DateTime('now');
        $fechaf= date('Y-m-d', strtotime('+8 week', ($fechai->getTimestamp())));
        $acudienteinfante = new AcudienteInfante();
        $acudienteinfante->Id_Acudiente = $user->cuidador->Id_Acudiente;
        $acudienteinfante->Id_Infante = $infante->Id_Infante;
        $acudienteinfante->Id_RelacionInfante = $req->input('Id_RelacionInfante');
        $acudienteinfante->Fecha_Inicial = $fechai;
        $acudienteinfante->Fecha_Final = $fechaf;
        $acudienteinfante->save();

        $actividadGrupo = DB::select("select a.Id_Actividad
                                    from actividad_grupo a, grupo_poblacional b 
                                    where a.Id_Grupo_Poblacional = b.Id_Grupo_Poblacional 
                                    and (b.EdadMinima_Grupo_Poblacional<=? and b.EdadMaxima_Grupo_Poblacional>?)
                                    group by a.Id_Actividad;",[$infante->Edad_Infante,$infante->Edad_Infante]);

      //  dd($actividadGrupo);

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
