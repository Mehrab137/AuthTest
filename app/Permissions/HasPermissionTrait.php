<?php

namespace App\Permissions;

use App\Models\{Role, Permission};

trait HasPermissionTrait
{
    public function givePermissionsTo(...$permissions)
    {
       $permissions = $this->getAllPermissions($permissions);

        if($permisssions === null)
        {
            return $this;
        }

        $this->permissions()->saveMany($permissions);

        return $this;
    }

    public function withdrawPermissionsTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);

        return $this->permissions()->detach($permissions);
    }

    public function refreshPermissions(...$permissions)
    {
        $this->permissions()->detach($permissions);

        return $this->givePermissionsTo($permissions);
    }

    public function hasPermissionTo($permissions)
    {
        return $this->hasPermissionThroughRole($permissions) || $this->hasPermission($permissions);
    }

    public function hasPermissionThroughRole()
    {
        foreach($roles as $role)
        {
            if($this->$role->contains($role)){
                return true;
            }   
        }
        return false;
    }

    public function hasRole(...$roles)
    { 
        foreach ($roles as $role)
        {
            if($this->$role->contains('name', $role)){
                return true;
            }
        }
        return false;
    }

    public function roles()
    {
        $this->belongsToMany(Role::class, 'admin_roles');
    }

    public function permissions()
    {
        $this->belongsToMany(Permission::class, 'admin_permissions');
    }

    protected function hasPermission($permission) 
    {
        return (bool) $this->permissions->where('name', $permission->name)->count();
    }
      
    protected function getAllPermissions(array $permissions)
    {
        return $this->whereIn('name', $permissions)->get(); 
    }

};