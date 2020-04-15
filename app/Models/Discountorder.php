<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discountorder extends Model
{
    public $timestamps = true;

    public function discount(){
        return $this->belongsTo('App\Models\Discount', 'discountid');
    }

    public function user(){
        return $this->belongsTo('App\Models\Order','userid');
    }
}
