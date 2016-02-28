<?php

use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPermission('room-create', 'Create Room');
        $this->createRole('admin', 'Administrator', ['room-create']);
        $this->createRole('user', 'User', ['room-create']);
    }

    private function createPermission($name, $label)
    {
        Permission::updateOrCreate(['name' => $name, 'label' => $label]);
    }

    private function createRole($name, $label, $permissions)
    {
        $role = Role::updateOrCreate(['name' => $name, 'label' => $label]);

        foreach ($permissions as $permissionName) {
            $permission = $this->getPermission($permissionName);
            $role->givePermissionTo($permission);
        }
    }

    private function getPermission($permissionName)
    {
        return Permission::whereName($permissionName)->first();
    }
}
