<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaActividades extends Model
{
    protected $table = "pregunta_actividades";

    protected $primaryKey = "Id_Pregunta";

    public $timestamps = false;

    public function opcionPreguntaActividad(){
        return $this->hasMany('App/OpcionPreguntaActividad','Id_Pregunta');
    }

    public function respuestaMultipleActividad(){
        return $this->hasMany('App/RespuestaMultipleActividad','Id_Pregunta');
    }

    public function respuestaAbiertaActividad(){
        return $this->hasMany('App/RespuestaAbiertaActividad','Id_Pregunta');
    }

}
