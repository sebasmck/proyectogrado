<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EscalaResilienciaWY;
use App\Cuidador;
use App\Enunciadowy;
use App\EscalarAcudiente;

class EscalaWYController extends Controller{


     public function index()
     {
        return view('escalaWY.escalaWYDatosIniciales');
     }
      
    public function escalaWYCuestionario(){

        return view('escalaWY.escalaWYCuestionario');
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
    }


    public function edit($id)
    {
        
    }

    
    public function updateCuidador(Request $request)
    {
       // $acudiente = DB::table('acudiente')->where('id_usuario', $id_usuario)->get();
         $id_usuario = auth()->id();
         $acudiente = Cuidador::where('id_usuario', $id_usuario)->get()[0];
         $acudiente->edad = $request->input('edad');
         $acudiente->num_hijos = $request->input('children');
         $acudiente->save();
      //
        return view('escalaWY.escalaWYCuestionario');
    }


    public function destroy($id)
    {
        
    }




}