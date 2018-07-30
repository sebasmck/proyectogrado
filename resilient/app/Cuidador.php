<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
   	protected $table = 'acudiente';

    protected $primaryKey = 'Id_Acudiente';

    public $timestamps = false;

}
