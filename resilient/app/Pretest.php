<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pretest extends Model
{    
    protected $table = 'Pretest';

    protected $primaryKey = 'Id_Pretest';

    public $timestamps = false;

    protected $fillable = [];

}
