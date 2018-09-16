<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscalaResilienciaEP2 extends Model
{
    protected $table = 'escalaresilienciaep2';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function respuestaEP2()
    {
    	return $this->hasone('App\RespuestaEP2','Id_Respuesta','id');
    }
    public function enunciadoEP2()
    {
    	return $this->hasone('App\EnunciadoEP2','id_EnunciadoEP2','id_EnunciadoEP2');
    }


}
