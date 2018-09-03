<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaPregunta extends Model
{
    protected $table = 'respuestapregunta';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function preguntas()
    {
    	return $this->hasMany('App\Preguntas','id_Pregunta','id');
    }
}
