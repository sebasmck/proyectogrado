<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
   	protected $table = 'acudiente';

    protected $primaryKey = 'Id_Acudiente';

    public $timestamps = false;

    public function sexo(){
        return $this->BelongsTo('App\Sexo','Id_Sexo');
    }

    public function escolaridad(){
        return $this->BelongsTo('App\Escolaridad','Id_Sexo');
    }

    public function ocupacion(){
        return $this->belongsTo('App\Ocupacion','Id_Ocupacion');
    }

}
