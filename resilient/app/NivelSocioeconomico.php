<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelSocioeconomico extends Model
{
    protected $table = "nivelsocieconomica";

    protected $primaryKey = "Id_NivelSocioEconomico";

    public $timestamps = false;
}
