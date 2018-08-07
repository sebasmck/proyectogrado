<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscalarAcudiente extends Model
{
    protected $table='escalar_acudiente';
    

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('Id_Acudiente', '=', $this->getAttribute('Id_Acudiente'))
            ->where('id_EscalaWY', '=', $this->getAttribute('id_EscalaWY'));
        return $query;
    }

    public function acudiente()
    {
    	return $this->hasone('App\Cuidador','Id_Acudiente','Id_Acudiente');
    }

    public function escalaResilienciaWY(){

        return $this->hasmany('App\EscalaResilienciaWY', 'id_EscalaWY' , 'id_EscalaWY');
    }

}
