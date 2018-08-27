<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
   	protected $table = 'acudiente';

    protected $primaryKey = 'Id_Acudiente';

    public $timestamps = false;

    public function sexo(){
        return $this->belongsTo('App\Sexo','Id_Sexo');
    }

    public function escolaridad(){
        return $this->belongsTo('App\Escolaridad','Id_Escolaridad');
    }

    public function ocupacion(){
        return $this->belongsTo('App\Ocupacion','Id_Ocupacion');
    }

    public function estadoCivil(){
        return $this->belongsTo('App\EstadoCivil','Id_EstadoCivil');
    }

    public function nacionalidad(){
        return $this->belongsTo('App\Nacionalidad','Id_Nacionalidad');
    }    

}
