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
        $this->createPermission('room-administer', 'Administer owned rooms');
        $this->createPermission('room-chat', 'Chat in followed rooms');
        $this->createPermission('user-view-all', 'View all users');
        $this->createPermission('user-view', 'View a user\'s profile');
        $this->createPermission('user-view-dashboard', 'View user dashboard');
        $this->createPermission('user-view-all-dashboard', 'View all users\' dashboards');

        $this->createRole('admin', 'Administrator', [
            'room-administer',
            'room-view-owned',
            'room-create',
            'room-invite',
            'room-chat',
            'user-view',
            'user-view-all',
            'user-view-dashboard',
            'user-view-all-dashboard',
        ]);

        $this->createRole('user', 'User', [
            'room-administer',
            'room-view-owned',
            'room-create',
            'room-invite',
            'room-chat',
            'user-view',
            'user-view-dashboard',
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
