<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preguntas_15_16_17 extends Model
{
    protected $table = 'preguntas_15_16_17';

    public $timestamps = false;

    public function preguntas()
    {
    	return $this->hasone('App\Preguntas','id_Preguntas','id');
    }
    public function documento()
    {
    	return $this->hasone('App\Documento','id_Documento','id');
    }
    public function usuario()
    {
    	return $this->hasone('App\User','id_usuario','id');
    }
}
