<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    //
    protected $table = "rooms";
    public $timestamps = false;

    public function catalogue_room(){
        return $this->belongsTo('App\catalogue_room','id_ctl','id');
    }

    // public function motels(){
    //     return $this->belongsTo('App\motels','id_mls','id');
    // }
}
