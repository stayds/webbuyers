<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

//    public function admins(){
//        return $this->belongsToMany('Admin\Models\Admin', 'admin_role', 'roleid', 'adminid')
//            ->withPivot('status')
//            ->withTimestamps();
//    }

    public function adminroles(){
        return $this->hasMany('Admin\Models\Admin_role', 'roleid');
    }
}
