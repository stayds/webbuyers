<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    public $timestamps = true;


    public function admin(){
        return $this->belongsTo('App\Models\Admin','adminid');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role', 'roleid');
    }


}
