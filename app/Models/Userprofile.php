<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Userprofile extends Model
{
    public $timestamps = true;

    public $primaryKey = 'userprofileid';

    protected $fillable = [
        'userid','stateid','fname', 'lname','phone','profileimg','address','created_at','updated_at'
    ];


    public function user(){
        return $this->belongsTo('App\Models\User','userid');
    }
    public function state(){
        return $this->belongsTo('App\Models\State','stateid');
    }
    public function fullname(){
        return $this->fname.' '.$this->lname;
    }
    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }
}
