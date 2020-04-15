<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productcategory extends Model
{
    public $primaryKey = 'prodcatid';
    public $timestamps = false;

    public function products(){
        return $this->hasMany('App\Models\Product', 'productid');
    }
}
