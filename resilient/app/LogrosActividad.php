<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogrosActividad extends Model
{
    protected $table = "logros_actividad";
    protected $primaryKey = "id_logros";
    public $timestamps = false;

    function actividad(){
        $this->hasMany('App/Actividad','Id_Actividad','Id_Actividad');
    }

    function acudienteRelacionInfante(){
        $this->hasMany('App/AcudienteInfante','id_AcudienteInfante','id');
    }
}