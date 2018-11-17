<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudad";

    protected $primaryKey = "Id_Ciudad";

    public $timestamps = false;

    public function departamento(){
        return $this->belongsTo('App\Departamento','Id_Departamento','Id_Departamento');
    }
}
