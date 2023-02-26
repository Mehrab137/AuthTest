<?php

namespace App\Permissions;

use App\Models\{Role, Permission};

trait HasPermissionTrait
{

    public function hasRole(...$roles)
    { 
        foreach ($roles as $role)
        {
            if($this->$role->contains('name', $role)){
                return true;
            }
        }
    }

    public function roles()
    {
        $this->belongsToMany(Role::class, 'admin_roles');
    }

    public function permissions()
    {
        $this->belongsToMany(Permission::class, 'admin_permissions');
    }
};