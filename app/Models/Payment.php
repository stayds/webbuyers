<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\Models\User','userid');
    }

    public function paymentstatus(){
        return $this->belongsTo('App\Models\Paymentstatus','paymentstatusid');
    }

    public function order(){
        return $this->belongsTo('App\Models\Order', 'orderid');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

}
