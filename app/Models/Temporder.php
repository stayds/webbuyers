<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temporder extends Model
{
    public $timestamps = true;


    protected $fillable = [
        'userid','productid','qty','created_at','updated_at'
    ];




}
