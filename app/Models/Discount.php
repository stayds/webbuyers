<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Discount extends Model
{
    public $timestamps = true;

    public function discountorders(){
        return $this->hasMany('App\Models\Discountorder', 'discountid');
    }

    public function discountproducts(){
        return $this->hasMany('App\Models\Discountproduct', 'discountid');
    }

    public function discountordhistory(){
        return $this->hasMany('App\Models\Discountordhistory', 'discountid');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

}
