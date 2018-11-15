<?php

namespace App\Http\Controllers;


use App\AcudienteInfante;
use App\Http\Controllers\Auth\RedireccionadorRolController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cache;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function displayUsers()
    {
        $users = User::all();
        return view('admin.UserManagement')->with('users', $users);
    }

    public function mostrarMenuCuidador()
    {
        return view('cuidador.menuCuidador');
    }

    public function traerInfantes() {

        $user = User::where('id',auth()->id())->with('cuidador.acudienteInfante.infante')->first();
        return view('cuidador.cuidador-infantes',['cuidador'=> $user->cuidador]);
    }

    public function dashboardInfante($id) {
        $ruta = "";
        $infoNavegacion = ['id_infante' => $id];
        Cache::store('database')->forever(auth()->id(),$infoNavegacion);
        return view('cuidador.dashboardInfante',['sour' => $ruta, 'infante' => $id]);
    }

    public function goEscala() {
        return view('escalaP2.escalaParentabilidad');
    }

    public function finalizarCurso(){
        $user = User::find(auth()->id());
        $cuidador = $user->cuidador;
        $cuidador->finalizo_curso = 1;
        $cuidador->save();

        $user->id_estado = 2;
        $user->save();

        return RedireccionadorRolController::redirectTo();
    }

}
