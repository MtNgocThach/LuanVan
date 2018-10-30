<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class motels extends Model
{
    //
    protected $table = "motels";
    public $timestamps = false;

    public function catalogue_room(){
        return $this->hasMany('App\catalogue_room','id_mls','id');
    }

    

    public function services(){
        return $this->hasMany('App\services','id_mls','id');
    }

    public function moteler(){
        return $this->belongsTo('App\moteler','id_mler','id');
    }

    public function rooms(){
        return $this->hasManyThrough('App\rooms','App\catalogue_room','id_mls','id_ctl','id');
    }

    public function account(){
        return $this->hasMany('App\account','id_mler','id');
    }
}
