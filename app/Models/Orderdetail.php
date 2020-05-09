<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{

    public $primaryKey = 'orderdetailid';

    protected $fillable = [
        'orderid','productid','quantity','unitprice','totalprice','created_at','updated_at'
    ];

    public function order(){
        return $this->belongsTo('App\Models\Order','orderid');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product','productid');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }
}
