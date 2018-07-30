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
        return view('cuidador.cuidador-infantes');
    }

    public function dashboardInfante( $src) {
        $ruta = "";
        if( $src == 1 )
        {
            $ruta = "http://www.javierfenoll.com/wp-content/uploads/2013/12/ni%C3%B1o-cara-chocolate.jpg";
        }else if($src == 2)
        {
            $ruta = "https://www.smartsalus.com/assets/media/por-genero-edades/infantil/nino-sonriendo-cara.jpg";
        }else if($src == 3)
        {
            $ruta = "https://www.euroxpress.es/img/2012/11/Informe_ni__os_Unicef.jpg";
        }else {
            $ruta = "http://spanish.xinhuanet.com/titlepic/134201981_1430467874917_title1n.jpg";
        }

        return view('cuidador.dashboardInfante',['sour' => $ruta]);
    }

}
