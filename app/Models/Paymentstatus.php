<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymentstatus extends Model
{
    public $primaryKey = "paymentstatusid";

    public function payments(){
        return $this->hasMany('App\Models\Payment','id');
    }
}
