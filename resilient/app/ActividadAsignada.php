<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadAsignada extends Model
{
    protected $table = "actividad_asignada";

    protected $primaryKey = "Id";

    protected $timestamps = false;

    public function acudienteInfante(){
        return $this->belongsTo('App/AcudienteInfante','id_RelacionAcudienteInfante');
    }

    public function actividad(){
        return $this->belongsTo('App/Actividad','Id_Actividad');
    }

    public function respuestaMultipleActividad(){
        return $this->hasMany('App/RespuestaMultipleActividad','id_RelacionAcudienteInfante');
    }

    public function respuestaAbiertaActividad(){
        return $this->hasMany('App/RespuestaAbiertaActividad','id_RelacionAcudienteInfante');
    }

}
