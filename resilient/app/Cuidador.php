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


}
