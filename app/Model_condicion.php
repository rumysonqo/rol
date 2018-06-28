<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_condicion extends Model
{
    //
    protected $table='condicion';
    protected $fillable=['descripcion']; 

    public function condicion()
    {
    	return $this->hasMany('App\Model_personal');
    }
}
