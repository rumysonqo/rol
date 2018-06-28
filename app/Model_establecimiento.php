<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Model_establecimiento extends Model
{
    //
    protected $table='establecimiento';
    protected $fillable=['descripcion','id_micro_red','ugipress','ipress','tipo','categoria']; 

    public function micro_red()
    {
    	return $this->hasOne('App\Model_micro_red','id');
    }

    public function personal()
    {
    	return $this->hasMany('App\Model_personal');
    }


    
}
