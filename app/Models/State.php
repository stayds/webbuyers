<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $primaryKey = 'stateid';

    public function userprofiles(){
        return $this->hasMany('App\Models\Userprofile', 'userprofileid');
    }

    public function billingaddresses(){
        return $this->hasMany('App\Models\Billingaddress');
    }

    public function billaddhistories(){
        return $this->hasMany('App\Models\Billaddhistory');
    }
}
