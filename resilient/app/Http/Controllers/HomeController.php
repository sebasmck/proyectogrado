<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;


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
        return view('cuidador.dashboardInfante',['sour' => $ruta]);
    }

    public function goEscala() {
        return view('escalaP2.escalaParentabilidad');
    }

}
