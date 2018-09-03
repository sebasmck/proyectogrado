<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscalaEP2Respuesta extends Model
{
    protected $table = 'escalaresilienciaep2_respuesta';

    public $timestamps = false;

    public function enunciado(){
        return $this->belongsTo('App\EscalaEp2Enunciado','id_EnunciadoEP2','id_EnunciadoEP2');
    }
}
