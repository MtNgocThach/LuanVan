<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    //
    protected $table = "users";
    public $timestamps = false;

    public function moteler(){
        return $this->belongsTo('App\moteler','id_mler','id');
    }
}
