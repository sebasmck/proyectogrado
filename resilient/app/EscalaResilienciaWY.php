<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscalaResilienciaWY extends Model
{
    protected $table = 'escalaresilienciawy';

    protected $primaryKey = 'id_EscalaWY';

    public function enunciadoWY(){
        return $this->hasmany('App\Enunciadowy','id_EnunciadoWY','id_EnunciadoWY');
    }
}
