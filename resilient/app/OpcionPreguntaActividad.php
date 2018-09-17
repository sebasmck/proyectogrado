<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpcionPreguntaActividad extends Model
{
    protected $table = "opcionpreguntaactividad";

    public $timestamps = false;

    public function preguntaActividades(){
        return $this->belongsTo('App/PreguntaActividades','Id_Pregunta');
    }
}
