<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderstatus extends Model
{
    public $primaryKey = 'orderstatid';

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }
}
