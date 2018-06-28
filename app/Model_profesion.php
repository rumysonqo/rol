<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_profesion extends Model
{
    //
    protected $table='profesion';
    protected $fillable=['descripcion']; 

    public function personal()
    {
    	return $this->hasMany('App\Model_personal');
    }
    
}
