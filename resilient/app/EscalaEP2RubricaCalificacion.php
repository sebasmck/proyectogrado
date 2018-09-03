<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscalaEP2RubricaCalificacion extends Model
{
    protected $table = 'escalaresilienciaep2_rubricacalificacion';

    public $timestamps = false;

    public function zona(){
        return $this->belongsTo('App\EscalaEp2Zona','id_escalaep2_zona');
    }

    public function competencia(){
        return $this->belongsTo('App\EscalaEp2Competencia','id_competenciaep2');
    }
}
