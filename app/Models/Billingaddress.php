<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billingaddress extends Model
{
    public $timestamps = true;
    public $primaryKey = "billaddressid";

    public function user(){
        return $this->belongsTo('App\Models\User','userid');
    }

    public function state(){
        return $this->belongsTo('App\Models\State','stateid');
    }

    public function billaddhistories(){
        return $this->hasMany('App\Billaddhistory');
    }

    public function fullname(){
        return $this->firstname.' '.$this->lastname;
    }
}
