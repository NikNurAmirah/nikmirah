<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    //Permission belongs to many roles
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
