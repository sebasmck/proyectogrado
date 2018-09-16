<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscalarAcudiente extends Model
{
    protected $table='escalar_acudiente';
    public $timestamps = false;

    public function acudiente()
    {
    	return $this->hasone('App\Cuidador','Id_Acudiente','Id_Acudiente');
    }


}
