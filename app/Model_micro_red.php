<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Model_micro_red extends Model
{
    //
    protected $table='micro_red';
    protected $fillable=['descripcion']; 

    public function establecimiento()
    {
    	return $this->hasMany('App\Model_establecimiento');
    }

    public function scopeMicroRed($query)
    {
        return $query->select(DB::raw('id, descripcion'));
    }


}
