<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscalaEP2DetalleCalificacion extends Model
{
    protected $table = 'escalaresilienciaep2_detallecalificacion';

    public $timestamps = false;

    public function rubrica(){
        return $this->belongsTo('App\EscalaEP2RubricaCalificacion','id_rubricaCalificacionEp2');
    }
}
