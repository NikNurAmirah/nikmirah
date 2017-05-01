<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //A permission has many roles
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    //This handles the pivot table linking the roles and permissions together
    public function givePermissionTo(Permission $permission){
        return $this->permission()->sync($permission);
    }
}
