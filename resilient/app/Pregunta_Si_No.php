<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta_Si_No extends Model
{
    protected $table = 'pregunta_si_no';

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
