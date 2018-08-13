<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use App\Preguntas;
use App\Pregunta1_2;
use App\Pregunta_3;

class PretestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('pretest.pretest0');
    }

    // start sequencer

    public function pretest1(){

        return view('pretest.pretest1');

    }

    public function pretest2(Request $request)
    {
        $preguntas = 1;
        $documento = 1;
        $pregunta1 = new Pregunta1_2();
        $usuario = auth()->id();
        $pregunta1->id_Documento = $documento;
        $pregunta1->id_Preguntas = $preguntas;
        $pregunta1->id_usuario = $usuario;
         
        if ($request->input('opcion')== 1 && $request->input('textarea1')==true ) 
        {
            $casono = 0;
            $pregunta1->si = 1;
            $pregunta1->no = $casono;
            $pregunta1->respuesta =$request->input('textarea1');
            $pregunta1->save();
        } 
        else if($request->input('opcion')==2 && $request->input('textarea2')==true) 
        {
            $casosi = 0;
            $pregunta1->no =1;
            $pregunta1->si = $casosi;
            $pregunta1->respuesta =$request->input('textarea2');
            $pregunta1->save();
        }
        return view('pretest.pretest2');
    }

    public function pretest3(){

        return view('pretest.pretest3');

    }
    
    public function pretest4(Request $request)
    {
        $preguntas = 2;
        $documento = 1;
        $pregunta1 = new Pregunta1_2();
        $usuario = auth()->id();
        $pregunta1->id_Documento = $documento;
        $pregunta1->id_Preguntas = $preguntas;
        $pregunta1->id_usuario = $usuario;
         
        if ($request->input('option')== 1 && $request->input('textarea1')==true ) 
        {
            $casono = 0;
            $pregunta1->si = 1;
            $pregunta1->no = $casono;
            $pregunta1->respuesta =$request->input('textarea1');
            $pregunta1->save();
        } 
        else if($request->input('option')==2 && $request->input('textarea2')==true) 
        {
            $casosi = 0;
            $pregunta1->no = 1;
            $pregunta1->si = $casosi;
            $pregunta1->respuesta =$request->input('textarea2');
            $pregunta1->save();
        }

        return view('pretest.pretest4');

    }

     public function pretest5(Request $request){
        // pregunta 3      
        $preguntas = 3;
        $documento = 1;

        $pregunta3 = new Pregunta_3();
        $usuario = auth()->id();

        $pregunta3->id_Documento = $documento;
        $pregunta3->id_Preguntas = $preguntas;
        $pregunta3->id_usuario = $usuario;
        $pregunta3->Autoestima = $request->input('autoestima');
        $pregunta3->Afecto = $request->input('afecto');
        $pregunta3->Autonomia = $request->input('autonomia');
        $pregunta3->Reconocimiento = $request->input('reconocimiento');
        $pregunta3->Confianza = $request->input('confianza');
        $pregunta3->save();
   
        return view('pretest.pretest5');

    }
    
    public function pretestPrueba(){
        return view ('pretest.pretestprueba');
    }

    public function pretestPrueba1(){
        return view ('pretest.pretestprueba1');
    }

    public function pretestPrueba2(){
        return view('pretest.pretestprueba2');
    }

    public function pretestPrueba3(){
        return view('pretest.pretestprueba3');
    }

    public function pretestPrueba4(){
        return view('pretest.pretestprueba4');
    }
    
    public function pretestPrueba5(){
        return view('pretest.pretestprueba5');
    }

    public function pretestPrueba6(){
        return view('pretest.pretestprueba6');
    }

    public function pretestPrueba7(){
        return view('pretest.pretestprueba7');
    }


    public function pretestPrueba8(){
        return view('pretest.pretestprueba8');
    }

    public function pretestPrueba9(){
        return view('pretest.pretestprueba9');
    }

    public function pretestPrueba10(){
        return view('pretest.pretestprueba10');
    }

    public function pretestPrueba11(){
        return view('pretest.pretestprueba11');
    }
    public function pretestPrueba12(){
        return view('pretest.pretestprueba12');
    }
    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
