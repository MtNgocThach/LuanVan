<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class catalogue_room extends Model
{
    //
    protected $table = "catalogue_room";
    public $timestamps = false;

    public function motels(){
        return $this->belongsTo('App\motels','id_mls','id');
    }

    public function catalogue(){
        return $this->belongsTo('App\catalogue','id_ctlg','id');
    }
    public function rooms(){
        return $this->hasMany('App\rooms','id_ctl','id');
    }

}
