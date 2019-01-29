<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamento";

    protected $primaryKey = "Id_Departamento";

    public $timestamps = false;

    public function ciudades(){
        return $this->hasMany('App\Ciudad','Id_Departamento','Id_Departamento');
    }
}
