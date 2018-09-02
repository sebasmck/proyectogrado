<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificacion';

    public $timestamps = false;

    public function preguntacierre()
    {
    	return $this->hasmany('App\PreguntasCierre','id_PreguntasCierre','id');
    }

    public function usuario()
    {
    	return $this->hasmany('App\User','id_usuario','id');
    }
}
