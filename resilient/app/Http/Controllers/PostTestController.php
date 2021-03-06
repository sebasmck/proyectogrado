<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Documento;
use App\Preguntas;
use App\Pregunta1_2;
use App\Pregunta_3;
use App\Pregunta_6;
use App\Preguntas_15_16_17;
use App\RespuestaSeleccionada;
use App\Calificacion_Des;
use App\Calificacion;
use App\Pregunta_Si_No;
use App\PreguntasCierre;
use App\RespuestaPregunta;

class PostTestController extends Controller
{
    public function index()
    {   
        return view ('posttest.postest');
    }
    
    public function postTest1()
    {
        return view ('posttest.posttest1');
    }


     public function posttest2(Request $request)
     {
        $preguntas = 1;
        $documento = 2;
        $pregunta1 = new Pregunta1_2();
        $usuario = auth()->id();
        $pregunta1->id_Documento = $documento;
        $pregunta1->id_Preguntas = $preguntas;
        $pregunta1->id_usuario = $usuario;
         
        if ($request->input('inlineRadioOptions')== 1 && $request->input('textarea1')==true ) 
        {
            $casono = 0;
            $pregunta1->si = 1;
            $pregunta1->no = $casono;
            $pregunta1->respuesta =$request->input('textarea1');
            $pregunta1->save();
        } 
        else if($request->input('inlineRadioOptions')==2 && $request->input('textarea2')==true) 
        {
            $casosi = 0;
            $pregunta1->no =1;
            $pregunta1->si = $casosi;
            $pregunta1->respuesta =$request->input('textarea2');
            $pregunta1->save();
        }
        return view('posttest.posttest2');
    }

    public function posttest3()
    {
        return view('posttest.posttest3');
    }
    
    public function posttest4(Request $request)
    {
        $preguntas = 2;
        $documento = 2;
        $pregunta1 = new Pregunta1_2();
        $usuario = auth()->id();
        $pregunta1->id_Documento = $documento;
        $pregunta1->id_Preguntas = $preguntas;
        $pregunta1->id_usuario = $usuario;
         
        if ($request->input('inlineRadioOptions')== 1 && $request->input('textarea1')==true ) 
        {
            $casono = 0;
            $pregunta1->si = 1;
            $pregunta1->no = $casono;
            $pregunta1->respuesta =$request->input('textarea1');
            $pregunta1->save();
        } 
        else if($request->input('inlineRadioOptions')==2 && $request->input('textarea2')==true) 
        {
            $casosi = 0;
            $pregunta1->no = 1;
            $pregunta1->si = $casosi;
            $pregunta1->respuesta =$request->input('textarea2');
            $pregunta1->save();
        }
        return view('posttest.posttest4');
    }

     public function posttest5(Request $request)
     {
         // pregunta 3      
         $preguntas = 3;
         $documento = 2;
 
         $pregunta3 = new Pregunta_3();
         $usuario = auth()->id();

         $pregunta3->id_Documento = $documento;
         $pregunta3->id_Preguntas = $preguntas;
         $pregunta3->id_usuario = $usuario;
         $pregunta3->Autoestima = $request->has('Autoestima')?$request->input('Autoestima'):'0';
         $pregunta3->Afecto = $request->has('Afecto')?$request->input('Afecto'):'0';
         $pregunta3->Autonomia = $request->has('Autonomia')?$request->input('Autonomia'):'0';
         $pregunta3->Reconocimiento = $request->has('Reconocimiento')?$request->input('Reconocimiento'):'0';
         $pregunta3->Confianza = $request->has('Confianza')?$request->input('Confianza'):'0';
        
         $pregunta3->save();

        return view('posttest.posttest5');
     }

    public function posttestPrueba1(){
        return view('posttest.posttestprueba1');
    }

     public function posttestPrueba2 (Request $request){

          // pregunta 4      
        $preguntas = 4;
        //documento pre test 
        $documento = 2;
        $pregunta4 = new RespuestaSeleccionada();
        $usuario = auth()->id();
        $pregunta4->id_Documento = $documento;
        $pregunta4->id_Pregunta = $preguntas;
        $pregunta4->id_usuario = $usuario;
        $pregunta4->seleccionada=$request->input('optionsRadios');
        $pregunta4->save();

        return view('posttest.posttestprueba2');
    }

    public function posttestPrueba3 (Request $request){
         // pregunta 5      
         $preguntas = 5;
         //documento pre test 
         $documento = 2;
         $pregunta5 = new RespuestaSeleccionada();
         $usuario = auth()->id();
         $pregunta5->id_Documento = $documento;
         $pregunta5->id_Pregunta = $preguntas;
         $pregunta5->id_usuario = $usuario;
         $pregunta5->seleccionada = $request->input('optionsRadios');
         $pregunta5->save();
        return view('posttest.posttestprueba3');
    }
     
    public function postTestPrueba3Res(Request $request)
    {   
        $preguntas = 6;
        $documento = 2;
        $pregunta6 = new Pregunta_6();
        $usuario = auth()->id();
        $pregunta6->id_Documento = $documento;
        $pregunta6->id_Pregunta = $preguntas;
        $pregunta6->id_usuario = $usuario;
        $pregunta6->Ignorar = $request->has('ignorar')?$request->input('ignorar'):'0';
        $pregunta6->Golpear = $request->has('golpear')?$request->input('golpear'):'0';
        $pregunta6->Explicarle = $request->has('explicarle')?$request->input('explicarle'):'0';
        $pregunta6->Amenazar = $request->has('amenazar')?$request->input('amenazar'):'0';
        $pregunta6->Libertad = $request->has('prefiere')?$request->input('prefiere'):'0';
        $pregunta6->Razonar = $request->has('razonar')?$request->input('razonar'):'0';
        $pregunta6->Gritar = $request->has('grita')?$request->input('grita'):'0';
        $pregunta6->Tecnica = $request->has('no')?$request->input('no'):'0';        
        $pregunta6->Reflexionar = $request->has('reflexionar')?$request->input('reflexionar'):'0';
        $pregunta6->save();

        $str = "";

        if($pregunta6->Ignorar == 1 &&  $pregunta6->Libertad==1 && $pregunta6->Tecnica == 1 )
        {
            $str="Tienes un estilo de crianza permisivo. Este estilo suele darles amplia libertad a tus hijos,
             también opta por un bajo establecimiento de normas y límites.";
        }
        else if ($pregunta6->Gritar == 1 &&  $pregunta6->Golpear ==1 && $pregunta6->Amenazar==1)
        {
            $str="Tienes un estilo de crianza autoritario. En este estilo se suelen usar castigos ante el
            comportamiento del niño/a, el enfoque está más en los comportamientos negativos, en
            ocasiones se puede llegar a ser rígido, y usar castigo físico.";

        }else if($pregunta6->Explicarle == 1 &&  $pregunta6->Razonar==1 && $pregunta6->Reflexionar ==1)
        {
            $str="Tienes un estilo de crianza democrático. Este estilo se caracteriza porque los padres son
            directivos y establecen normas claras y coherentes, pero al mismo tiempo toman en cuenta las
            opiniones de sus hijos";
        }
        else 
        {
            $str="No tienes un estilo de crianza definido";
        }
        return view ('posttest.posttestprueba3res')->with('result' , $str);
    }

    public function posttestPrueba4(){
        return view('posttest.posttestprueba4');
    }

    public function posttestPrueba5(Request $request)
    {
          // pregunta 7      
         $preguntas = 7;
         //documento pre test 
         $documento = 2;
 
         $pregunta7 = new RespuestaSeleccionada();
         $usuario = auth()->id();
         $pregunta7->id_Documento = $documento;
         $pregunta7->id_Pregunta = $preguntas;
         $pregunta7->id_usuario = $usuario;
         $pregunta7->seleccionada=$request->input('optionsRadios');
         $pregunta7->save();

        return view('posttest.posttestprueba5');
    }

    public function posttestPrueba6(Request $request){
        // pregunta 8      
       $preguntas = 8;
       //documento pre test 
       $documento = 2;

       $pregunta8 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta8->id_Documento = $documento;
       $pregunta8->id_Pregunta = $preguntas;
       $pregunta8->id_usuario = $usuario;
       $pregunta8->seleccionada=$request->input('optionsRadios');
       $pregunta8->save();

        return view('posttest.posttestprueba6');
    }

    public function posttestPrueba7(Request $request){
        // pregunta 9      
       $preguntas = 9;
       //documento pre test 
       $documento = 2;
       $pregunta9 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta9->id_Documento = $documento;
       $pregunta9->id_Pregunta = $preguntas;
       $pregunta9->id_usuario = $usuario;
       $pregunta9->seleccionada=$request->input('optionsRadios');
       $pregunta9->save();

        return view('posttest.posttestprueba7');
    }


    public function posttestPrueba8(Request $request){
        // pregunta 10      
       $preguntas = 10;
       //documento pre test 
       $documento = 2;
       $pregunta10 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta10->id_Documento = $documento;
       $pregunta10->id_Pregunta = $preguntas;
       $pregunta10->id_usuario = $usuario;
       $pregunta10->seleccionada=$request->input('optionsRadios');
       $pregunta10->save();
        return view('posttest.posttestprueba8');
    }

    public function posttestPrueba9(Request $request){
         // pregunta 11      
       $preguntas = 11;
       //documento pre test 
       $documento = 2;
       $pregunta11 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta11->id_Documento = $documento;
       $pregunta11->id_Pregunta = $preguntas;
       $pregunta11->id_usuario = $usuario;
       $pregunta11->seleccionada=$request->input('optionsRadios');
       $pregunta11->save();
        return view('posttest.posttestprueba9');
    }

    public function posttestPrueba10(Request $request){
         // pregunta 12      
       $preguntas = 12;
       //documento pre test 
       $documento = 2;
       $pregunta12 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta12->id_Documento = $documento;
       $pregunta12->id_Pregunta = $preguntas;
       $pregunta12->id_usuario = $usuario;
       $pregunta12->seleccionada=$request->input('optionsRadios');
       $pregunta12->save();
        return view('posttest.posttestprueba10');
    }

    public function posttestPrueba11(Request $request){
         // pregunta 13      
       $preguntas = 13;
       //documento pre test 
       $documento = 2;
       $pregunta13 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta13->id_Documento = $documento;
       $pregunta13->id_Pregunta = $preguntas;
       $pregunta13->id_usuario = $usuario;
       $pregunta13->seleccionada=$request->input('optionsRadios');
       $pregunta13->save();
        return view('posttest.posttestprueba11');
    }
    public function posttestPrueba12(Request $request){
         // pregunta 14      
       $preguntas = 14;
       //documento pre test 
       $documento = 2;
       $pregunta14 = new RespuestaSeleccionada();
       $usuario = auth()->id();
       $pregunta14->id_Documento = $documento;
       $pregunta14->id_Pregunta = $preguntas;
       $pregunta14->id_usuario = $usuario;
       $pregunta14->seleccionada=$request->input('optionsRadios');
       $pregunta14->save();
        return view('posttest.posttestprueba12');
    }

    public function preguntasCierre(Request $request){
    
        return view('posttest.preguntascierreposttest');
    }

   public function preguntasCierrePrueba ()
   {
    return view('posttest.preguntascierreposttest');
   }

    public function respuestasPostest(Request $request)
    {
        //$res = RespuestaPregunta::where('ValorDeVerdad', 1)->get();
         //pregunta 15      
       $preguntas_15 = 15;
       //pregunta 17      
       $preguntas_16 = 16;
       //pregunta 17      
       $preguntas_17 = 17;

       //documento pre test 
       $documento = 2;
       $usuario = auth()->id();
       $pregunta15 = new Preguntas_15_16_17(); 
       $pregunta16 = new Preguntas_15_16_17(); 
       $pregunta17 = new Preguntas_15_16_17();
    
       $pregunta15->id_Documento =  $documento; 
       $pregunta15->id_usuario =  $usuario; 
       $pregunta15->id_Preguntas =  $preguntas_15; 
       $pregunta15->valorDeVerdad  = $request->input('pregunta15');
       $pregunta15->save();  
       
       $pregunta16->id_Documento =  $documento; 
       $pregunta16->id_usuario =  $usuario;  
       $pregunta16->id_Preguntas =  $preguntas_16; 
       $pregunta16->valorDeVerdad  = $request->input('pregunta16');
       $pregunta16->save(); 

       $pregunta17->id_Documento =  $documento; 
       $pregunta17->id_usuario =  $usuario; 
       $pregunta17->id_Preguntas =  $preguntas_17; 
       $pregunta17->valorDeVerdad  = $request->input('pregunta17');
       $pregunta17->save(); 

        $array = [4,5,7,8,9,10,11,12,13,14,15,16,17];

        $res= DB::table('respuestapregunta')
            ->join('preguntas', 'respuestapregunta.id_pregunta', '=', 'preguntas.id')
            ->select('respuestapregunta.*', 'preguntas.Enunciado')->where('ValorDeVerdad', 1)->orderBy('preguntas.id')
            ->get();

        return view('posttest.respuestaposttest')->with('result' , $res) -> with('num',$array);
    }


    public function preguntasCierre1()
    {
        return view('posttest.preguntascierreposttest1');
    }

    public function preguntasCierre2(Request $request)
    {
        $calificacion = new Calificacion ();  
        $preguntaCierreCalificacion = 1 ;
        $usuario = auth()->id();
        //insertar calificacion puntaje 
        $calificacion->id_PreguntaCierre = $preguntaCierreCalificacion; 
        $calificacion->id_usuario =$usuario; 
        $calificacion->puntaje = $request->input('myCheckbox1');
        $calificacion->save();
        //insertar calificacion con descripción
        $calificacionDes = new Calificacion_Des ();  
        $preguntaCierreCalificacion2 = 2 ;
        $calificacionDes->id_PreguntaCierre = $preguntaCierreCalificacion2; 
        $calificacionDes->id_usuario =$usuario; 
        $calificacionDes->descripcion = $request->input('textarea13');
        $calificacionDes->save();
        return view('posttest.preguntascierreposttest2');
    }

    public function preguntasCierre3(Request $request)
    {

        $calificacion = new Calificacion ();  
        $preguntaCierreCalificacion = 3 ;
        $usuario = auth()->id();
        //insertar calificacion puntaje 
        $calificacion->id_PreguntaCierre = $preguntaCierreCalificacion; 
        $calificacion->id_usuario =$usuario; 
        $calificacion->puntaje = $request->input('myCheckbox1');
        $calificacion->save();
        //insertar calificacion con descripción
        $calificacionDes = new Calificacion_Des ();  
        $preguntaCierreCalificacion2 = 4 ;
        $calificacionDes->id_PreguntaCierre = $preguntaCierreCalificacion2; 
        $calificacionDes->id_usuario =$usuario; 
        $calificacionDes->descripcion = $request->input('textarea13');
        $calificacionDes->save();
        return view('posttest.preguntascierreposttest3');
    }
    public function preguntasCierre4(Request $request)
    {
        $usuario = auth()->id();
        //primera pregunta 
        $preguntaSiNo1 = new Pregunta_Si_No();
        $preguntaCierreCalificacion = 5 ;
        $preguntaSiNo1 ->id_PreguntaCierre = $preguntaCierreCalificacion;
        $preguntaSiNo1->id_usuario =$usuario; 
        $preguntaSiNo1->descripcion =$request->input('textarea13'); 
        $preguntaSiNo1->valorVerdad =$request->input('myCheckbox1'); 
        $preguntaSiNo1->save();
        //segunda pregunta
        $preguntaSiNo2 = new Pregunta_Si_No();
        $preguntaCierreCalificacion2 = 6 ;
        $preguntaSiNo2->id_PreguntaCierre = $preguntaCierreCalificacion2;
        $preguntaSiNo2->id_usuario =$usuario; 
        $preguntaSiNo2->descripcion =$request->input('textarea2'); 
        $preguntaSiNo2->valorVerdad =$request->input('myCheckbox2'); 
        $preguntaSiNo2->save();
        return view('posttest.preguntascierreposttest4');
    }

    public function preguntasCierreFinal(Request $request)
    {
        $calificacion = new Calificacion ();  
        $preguntaCierreCalificacion = 7;
        $usuario = auth()->id();
        //insertar calificacion puntaje 
        $calificacion->id_PreguntaCierre = $preguntaCierreCalificacion; 
        $calificacion->id_usuario =$usuario; 
        $calificacion->puntaje = $request->input('myCheckbox1');
        $calificacion->save();

        $calificacion2 = new Calificacion ();  
        $preguntaCierreCalificacion2 = 8 ;
        //insertar calificacion puntaje 
        $calificacion2->id_PreguntaCierre = $preguntaCierreCalificacion2; 
        $calificacion2->id_usuario =$usuario; 
        $calificacion2->puntaje = $request->input('myCheckbox2');
        $calificacion2->save();
        return view('posttest.preguntascierreposttestfinal');
    }
}
