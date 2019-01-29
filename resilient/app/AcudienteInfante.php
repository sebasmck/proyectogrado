<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcudienteInfante extends Model
{
    protected $table = 'acudiente_infante';

    public $timestamps = false;

    protected $casts = [
        'Fecha_Inicial' => 'timestamp',
        'Fecha_Final' => 'timestamp'
    ];


    public function relacionInfante()
    {
        return $this->hasOne('App\RelacionInfante','Id_RelacionInfante','Id_Relacion_Acudiente_Infante');
    }

    public function infante()
    {
        return $this->belongsTo('App\Infante','Id_Infante');
    }

    public function actividadesAsignadas(){
        return $this->hasMany('App\ActividadAsignada','id_RelacionAcudienteInfante');
    }
}
