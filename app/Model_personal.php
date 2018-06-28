<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_personal extends Model
{
    //
    protected $table='personal';
    protected $fillable=['dni','nombre','paterno','materno','id_profesion','colegiatura','id_condicion','id_establecimiento']; 

    public function profesion()
    {
    	return $this->hasOne('App\Model_profesion','id');
    }

    public function condicion()
    {
    	return $this->hasOne('App\Model_condicion','id');
    }

    public function establecimiento()
    {
        return $this->hasOne('App\Model_establecimiento','id');
    }

}
