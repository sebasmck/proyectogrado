<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDoc extends Model
{
    protected $table = 'tipodocumento';

    protected $primaryKey = 'Id_TipoDocumento';

    public $timestamps = false;
}
