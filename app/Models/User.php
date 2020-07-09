<?php

namespace App\Models;

use App\Notifications\UserVerify;
use App\Notifications\VerifyApiUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;



class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','regmodeid','phone','password','created_at','updated_at','status'
    ];

    public $timestamps = true;


    //set primary key
    protected $primaryKey = 'userid';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registermode(){
        return $this->belongsTo('App\Models\Registermode');
    }

    public function userprofile(){
        return $this->hasOne('App\Models\Userprofile', 'userid');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'product_user', 'userid', 'productid')
                    ->withPivot('status')
                    ->withTimestamps();
    }

    public function orders(){
        return $this->hasMany('App\Models\Order', 'orderid');
    }

    public function billingaddress(){
        return $this->hasOne('App\Models\Billingaddress', 'userid');
    }

    public function payments(){
        return $this->hasMany('App\Models\Payment','userid');
    }

    public function discountorders(){
        return $this->hasMany('App\Models\Discountorder', 'userid');
    }

    public function discountordhistory(){
        return $this->hasMany('App\Models\Discountordhistory', 'userid');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new UserVerify());
    }

    public function sendApiEmailVerificationNotification()
    {
        $this->notify(new VerifyApiUser()); // my notification
    }

}
