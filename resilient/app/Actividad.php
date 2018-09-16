<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = "actividad";

    protected $primaryKey = "Id_Actividad";

    protected $timestamps = false;

    public function preguntaActividades(){
        return $this->hasMany('App/PreguntaActividades','Id_Actividad','Id_Actividad');
    }

    public function actividadesAsignadas(){
        return $this->hasMany('App/ActividadAsignada','Id_Actividad','Id_Actividad');
    }

    public function actividadesGrupos(){
        return $this->hasMany('App/ActividadGrupo','Id_Actividad','Id_Actividad');
    }
}
