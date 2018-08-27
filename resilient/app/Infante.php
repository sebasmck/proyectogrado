<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infante extends Model
{
    protected $table = 'infante';

    protected $primaryKey = 'Id_Infante';

    public $timestamps = false;

    protected $casts = [
        'FechaDeNacimiento_Infante' => 'timestamp',
    ];
}
