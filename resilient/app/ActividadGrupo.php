<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadGrupo extends Model
{
    protected $table = "actividad_grupo";

    protected $primaryKey = "Id_Actividad_Grupo";

    public $timestamps = false;

    function grupoPoblacional (){
        $this->belongsTo('App\GrupoPoblacional','Id_Grupo_Poblacional','Id_Grupo_Poblacional');
    }

    function actividad(){
        $this->hasMany('App\Actividad','Id_Actividad','Id_Actividad');
    }
}
