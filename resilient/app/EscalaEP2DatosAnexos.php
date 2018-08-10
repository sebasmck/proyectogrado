<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscalaEP2Acudiente extends Model
{
    protected $table = 'escalaep2_acudiente';

    public $timestamps = false;


     protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('id', '=', $this->getAttribute('id'))
            ->where('Id_Acudiente', '=', $this->getAttribute('Id_Acudiente'));
        return $query;
    }

    public function escalaresilienciaep2()
    {
    	return $this->hasmany('App\EscalaResilienciaEP2','id','id');
    }

    public function acudiente()
    {
    	return $this->hasone('App\Cuidador','Id_Acudiente','id_Acudiente');
    }
}
