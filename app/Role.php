<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo(Permission $permission)
    {
        $existing = $this->permissions()->find($permission->id);

        if ($existing == null) {
            return $this->permissions()->attach($permission);
        }

        return $existing;
    }
}
