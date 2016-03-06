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
        $this->createPermission('room-view-owned', 'View list of owned rooms');
        $this->createPermission('room-invite', 'Invite users to owned rooms');

        $this->createRole('admin', 'Administrator', [
            'room-create',
            'room-view-owned',
            'room-invite',
        ]);

        $this->createRole('user', 'User', [
            'room-create',
            'room-view-owned',
            'room-invite',
        ]);
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
