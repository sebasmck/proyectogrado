<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta_3 extends Model
{
    protected $table = 'pregunta_3';

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
