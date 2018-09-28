<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaAbiertaActividad extends Model
{
    protected $table = "repuesta_abiertaactividad";

    protected $primaryKey = "id_RespuestaAbierta";

    public $timestamps = false;
}
