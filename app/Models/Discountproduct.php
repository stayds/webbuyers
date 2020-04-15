<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discountproduct extends Model
{
    public $timestamps = true;

    public function discount(){
        return $this->belongsTo('App\Models\Discount', 'discountid');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product','id');
    }
}
