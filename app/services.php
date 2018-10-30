<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class services extends Model
{
    //
    protected $table = "services";
    public $timestamps = false;


    public function motels(){
        return $this->belongsTo('App\motels','id_mls','id');
    }
}
