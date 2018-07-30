<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estadocivil';

    protected $primaryKey = 'Id_EstadoCivil';

    public $timestamps = false;
}
