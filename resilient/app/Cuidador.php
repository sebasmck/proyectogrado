<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
   	protected $table = 'acudiente';

    protected $primaryKey = 'Id_Acudiente';

    public $timestamps = false;


    public function escolaridad(){
       return $this->hasone('App\Escolaridad' , 'Id_Escolaridad' , 'Id_Escolaridad');
    }

    public function estadoCivil(){
        return $this->hasone('App\EstadoCivil' , 'Id_EstadoCivil' , 'Id_EstadoCivil');
    }


    public function sexo(){
        return $this->BelongsTo('App\Sexo','Id_Sexo');
    }


    public function ocupacion(){
        return $this->belongsTo('App\Ocupacion','Id_Ocupacion');
    }


}
