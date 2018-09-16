<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaSeleccionada extends Model
{
    protected $table = 'respuestaseleccionada';

    public $timestamps = false;

    public function preguntas()
    {
    	return $this->hasone('App\Preguntas','id_Pregunta','id');
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
