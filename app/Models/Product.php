<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;
    public $primaryKey = 'productid';

    protected $fillable = [
        'prodcatid','prodcatname', 'description','price','discount','created_at','updated_at','productimg'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'product_user', 'productid','userid')
                    ->withPivot('status')
                    ->withTimestamps();
    }

    public function productcategory(){
        return $this->belongsTo('App\Models\Productcategory','prodcatid');
    }

    public function orderdetails(){
        return $this->hasMany('App\Models\Orderdetail', 'orderdetailid');
    }

    public function discountproduct(){
        return $this->belongsTo('App\Models\Discountproduct','productid');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

}
