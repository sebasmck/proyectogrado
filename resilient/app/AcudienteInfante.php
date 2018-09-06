<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcudienteInfante extends Model
{
    protected $table = 'acudiente_infante';

    public $timestamps = false;

    public function relacionInfante()
    {
        return $this->hasOne('App\RelacionInfante','Id_RelacionInfante','Id_Relacion_Acudiente_Infante');
    }
}