<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catalogue extends Model
{
    //
    protected $table = "catalogue";
    public $timestamps = false;

    public function catalogue_room(){
        return $this->hasMany('App\catalogue_room','id_ctlg','id');
    }

    // public function motels(){
    //     return $this->hasMany('App\motels','id_mls','id');
    // }
}
