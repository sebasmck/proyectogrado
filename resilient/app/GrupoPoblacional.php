<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoPoblacional extends Model
{
    protected $table = "grupo_poblacional";
    protected $primaryKey = "Id_Grupo_Poblacional";
    public $timestamps = false;

    function actividadGrupo(){
        $this->hasMany('App/ActividadGrupo','Id_Grupo_Poblacional','Id_Grupo_Poblacional');
    }
}
