<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $primaryKey = 'orderid';

    public function user(){
        return $this->belongsTo('App\Models\User','userid');
    }

    public function orderstatus(){
        return $this->belongsTo('App\Models\Orderstatus','orderstatid');
    }

    public function orderdetails(){
        return $this->hasMany('App\Models\Orderdetail', 'orderdetailid');
    }

    public function payment(){
        return $this->hasOne('App\Models\Payment','id' );
    }



    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->updated_at)->format('d/m/Y');
    }



//    public static function messages()
//    {
//        return [
//            'orderrefno.required' => 'Order Reference no. is required',
//            'orderrefno.min' => 'Order Reference no. can not be less than 6 Characters',
//        ];
//    }

}
