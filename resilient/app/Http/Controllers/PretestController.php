<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use App\Preguntas;
use App\Pregunta1_2;
use App\Pregunta_3;
use App\RespuestaSeleccionada;

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
        $pregunta3->Autoestima = $request->input('Autoestima');
        $pregunta3->Afecto = $request->input('Afecto');
        $pregunta3->Autonomia = $request->input('Autonomia');
        $pregunta3->Reconocimiento = $request->input('Reconocimiento');
        $pregunta3->Confianza = $request->input('Confianza');
        $pregunta3->save();
   
        return view('pretest.pretest5');

    }

    // no son para el pre test 
    public function pretestPrueba(){
        return view ('pretest.pretestprueba');
    }

    public function pretestPrueba1(){
        return view ('pretest.pretestprueba1');
    }
   // continua el pretest 
    public function pretestPrueba2(Request $request)
    {
          // pregunta 4      
        $preguntas = 4;
        //documento pre test 
        $documento = 1;
        $pregunta4 = new RespuestaSeleccionada();
        $usuario = auth()->id();
        $pregunta4->id_Documento = $documento;
        $pregunta4->id_Pregunta = $preguntas;
        $pregunta4->id_usuario = $usuario;
        $pregunta4->seleccionada=$request->input('optionsRadios');
        $pregunta4->save();
        return view('pretest.pretestprueba2');
    }

    public function pretestPrueba3(Request $request)
    {
        // pregunta 5      
        $preguntas = 5;
        //documento pre test 
        $documento = 1;
        $pregunta5 = new RespuestaSeleccionada();
        $usuario = auth()->id();
        $pregunta5->id_Documento = $documento;
        $pregunta5->id_Pregunta = $preguntas;
        $pregunta5->id_usuario = $usuario;
        $pregunta5->seleccionada = $request->input('optionsRadios');
        $pregunta5->save();
        return view('pretest.pretestprueba3');
    }

    public function pretestPrueba4(){
        return view('pretest.pretestprueba4');
    }
    
    public function pretestPrueba5(Request $request)
    {
         // pregunta 7      
         $preguntas = 7;
         //documento pre test 
         $documento = 1;
 
         $pregunta7 = new RespuestaSeleccionada();
         $usuario = auth()->id();
         $pregunta7->id_Documento = $documento;
         $pregunta7->id_Pregunta = $preguntas;
         $pregunta7->id_usuario = $usuario;
         $pregunta7->seleccionada=$request->input('optionsRadios');
         $pregunta7->save();
        return view('pretest.pretestprueba5');
    }

    public function pretestPrueba6(Request $request){
       // pregunta 8      
       $preguntas = 8;
       //documento pre test 
       $documento = 1;

       $pregunta8 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta8->id_Documento = $documento;
       $pregunta8->id_Pregunta = $preguntas;
       $pregunta8->id_usuario = $usuario;
       $pregunta8->seleccionada=$request->input('optionsRadios');
       $pregunta8->save();
        return view('pretest.pretestprueba6');
    }

    public function pretestPrueba7(Request $request){

         // pregunta 9      
       $preguntas = 9;
       //documento pre test 
       $documento = 1;
       $pregunta9 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta9->id_Documento = $documento;
       $pregunta9->id_Pregunta = $preguntas;
       $pregunta9->id_usuario = $usuario;
       $pregunta9->seleccionada=$request->input('optionsRadios');
       $pregunta9->save();

        return view('pretest.pretestprueba7');
    }


    public function pretestPrueba8(Request $request){

        // pregunta 10      
       $preguntas = 10;
       //documento pre test 
       $documento = 1;
       $pregunta10 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta10->id_Documento = $documento;
       $pregunta10->id_Pregunta = $preguntas;
       $pregunta10->id_usuario = $usuario;
       $pregunta10->seleccionada=$request->input('optionsRadios');
       $pregunta10->save();

        return view('pretest.pretestprueba8');
    }

    public function pretestPrueba9(Request $request){

        // pregunta 11      
       $preguntas = 11;
       //documento pre test 
       $documento = 1;
       $pregunta11 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta11->id_Documento = $documento;
       $pregunta11->id_Pregunta = $preguntas;
       $pregunta11->id_usuario = $usuario;
       $pregunta11->seleccionada=$request->input('optionsRadios');
       $pregunta11->save();

        return view('pretest.pretestprueba9');
    }

    public function pretestPrueba10(Request $request){
         // pregunta 12      
       $preguntas = 12;
       //documento pre test 
       $documento = 1;
       $pregunta12 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta12->id_Documento = $documento;
       $pregunta12->id_Pregunta = $preguntas;
       $pregunta12->id_usuario = $usuario;
       $pregunta12->seleccionada=$request->input('optionsRadios');
       $pregunta12->save();
        return view('pretest.pretestprueba10');
    }

    public function pretestPrueba11(Request $request){
         // pregunta 13      
       $preguntas = 13;
       //documento pre test 
       $documento = 1;
       $pregunta13 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta13->id_Documento = $documento;
       $pregunta13->id_Pregunta = $preguntas;
       $pregunta13->id_usuario = $usuario;
       $pregunta13->seleccionada=$request->input('optionsRadios');
       $pregunta13->save();
        return view('pretest.pretestprueba11');
    }
    public function pretestPrueba12(Request $request)
    {
         // pregunta 14      
       $preguntas = 14;
       //documento pre test 
       $documento = 1;
       $pregunta14 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta14->id_Documento = $documento;
       $pregunta14->id_Pregunta = $preguntas;
       $pregunta14->id_usuario = $usuario;
       $pregunta14->seleccionada=$request->input('optionsRadios');
       $pregunta14->save();
        return view('pretest.pretestprueba12');
    }
    
    public function pretestFinalizado(){
       
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
