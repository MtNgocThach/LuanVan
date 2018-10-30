<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class moteler extends Model
{
    //
    protected $table = "moteler";    
    public $timestamps = false;

    public function motels(){
        return $this->hasMany('App\motels','id_mler','id');
    }

    public function account(){
        return $this->hasMany('App\account','id_mler','id');
    }
}
