<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billaddhistory extends Model
{
    public function state(){
        return $this->belongsTo('App\Models\State');
    }

    public function billingaddress(){
        return $this->belongsTo('App\Models\Billingaddress');
    }


}
