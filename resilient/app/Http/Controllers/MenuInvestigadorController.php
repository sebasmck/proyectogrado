<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RedireccionadorRolController;
use App\User;
use Illuminate\Http\Request;
use App\EscalaResilienciaWY;
use App\Cuidador;
use App\Enunciadowy;
use App\EscalarAcudiente;

class MenuInvestigadorController extends Controller{


    // public function index()
    // {
    //    $id_usuario = auth()->id();
     //   $escol = Cuidador::with('escolaridad')->where('id_usuario', $id_usuario)->get()[0];
      //  $civil = Cuidador::with('estadoCivil')->where('id_usuario', $id_usuario)->get()[0];
     //    return view('escalaWY.escalaWYDatosIniciales')->with('escolaridad', $escol['escolaridad']['Nombre_Escolaridad'])->with('estadoCivi', $civil['estadoCivil']['Nombre_EstadoCivil']);
    // }

     public function index()
     {
        $id_usuario = auth()->id();
         return view('menuInvestigador.menuInvestigador');
     }

}