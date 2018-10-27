<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RedireccionadorRolController;
use App\User;
use Illuminate\Http\Request;
use App\EscalaResilienciaWY;
use App\Cuidador;
use App\Enunciadowy;
use App\EscalarAcudiente;

class EscalaWYController extends Controller{


     public function index()
     {
        $id_usuario = auth()->id();
        $escol = Cuidador::with('escolaridad')->where('id_usuario', $id_usuario)->get()[0];
        $civil = Cuidador::with('estadoCivil')->where('id_usuario', $id_usuario)->get()[0];
         return view('escalaWY.escalaWYDatosIniciales')->with('escolaridad', $escol['escolaridad']['Nombre_Escolaridad'])->with('estadoCivi', $civil['estadoCivil']['Nombre_EstadoCivil']);
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

    public function calculateEscalaWY(Request $request){
      $arr= [
       $request->input('inlineRadioOptions'),
       $request->input('inlineRadioOptions2'),
        $request->input('inlineRadioOptions3'),
       $request->input('inlineRadioOptions4'),
        $request->input('inlineRadioOptions5'),
      $request->input('inlineRadioOptions6'),
       $request->input('inlineRadioOptions7'),
       $request->input('inlineRadioOptions8'),
       $request->input('inlineRadioOptions9'),
       $request->input('inlineRadioOptions10'),
        $request->input('inlineRadioOptions11'),
        $request->input('inlineRadioOptions12'),
        $request->input('inlineRadioOptions13'),
        $request->input('inlineRadioOptions14'),
       $request->input('inlineRadioOptions15'),
        $request->input('inlineRadioOptions16'),
        $request->input('inlineRadioOptions17'),
        $request->input('inlineRadioOptions18'),
        $request->input('inlineRadioOptions19'),
       $request->input('inlineRadioOptions20'),
        $request->input('inlineRadioOptions21'),
        $request->input('inlineRadioOptions22'),
        $request->input('inlineRadioOptions23'),
       $request->input('inlineRadioOptions24'),
        $request->input('inlineRadioOptions25'),
      ];
        $size = count($arr);
        $sum = 0;
        $str = "";
        $img = "";

        for($i=0;$i<$size;$i++){
         $sum += $arr[$i];
      }

      if($sum >= 1 && $sum < 127){
          $str = "Tienes un nivel de Resiliencia Muy Bajo, 
          esto quiere decir que se te dificulta tener confianza,
           perseverancia, ecuanimidad y aceptación de ti mismo. Recuerda trabajar estos aspectos para mejorar
           tu resiliencia y al mismo tiempo fortalecer unas pautas de crianza resiliente con tus hijos.";
           $img = asset('img/test2.png');
          }else if($sum >= 127 && $sum < 140){
          $str="Tienes un nivel de Resiliencia Bajo, posees una tendencia a depender de otras 
          personas para enfrentar situaciones difíciles en tu vida, en ocasiones puedes tener
           sentimientos de culpabilidad por las decisiones tomadas o tener dificultad para 
           enfrentar obstáculos. Recuerda que la Resiliencia se puede construir en cualquier
            etapa de la vida, aquí aprenderás diferentes aspectos para fortalecer está característica,
             ten en cuenta que fortalecer tu resiliencia puede hacer más fácil apoyar una crianza 
             resiliente con tus hijos.";
      }else if($sum >= 140 && $sum < 148){
       $str="Tienes un nivel de Resiliencia Medio, posees indicadores de confianza en 
       ti mismo, ecuanimidad, perseverancia y aceptación de ti mismo";

      }else if($sum >= 148){
      $str = "Tienes un nivel de Resiliencia Alto, esto denota una capacidad para atravesar
       tiempos difíciles, dependiendo más de ti mismo que de otras personas,
       logrando encontrar una salida cuando te encuentras en una situación difícil";
       $img = asset('img/test1.png');

      }
      
      $escalaA = new EscalarAcudiente();
     // $escalaA->Id_Acudiente = auth()->id();
     $id_usuario = auth()->id();
     $acudiente = Cuidador::where('id_usuario', $id_usuario)->value('Id_Acudiente');
      
      $escalaA->Id_Acudiente = $acudiente;
      $escalaA->PuntosTotales = $sum;
      $escalaA->save();

      return  view('escalaWY.escalaWYResult')->with('result' , $str)->with('img', $img);  
    }

    public function finalizarEscala(){
        $user = User::find(auth()->id());
        $user->id_estado = 7;
        $user->save();

        return RedireccionadorRolController::redirectTo();
    }

}