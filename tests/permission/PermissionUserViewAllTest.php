<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionUserViewAllTest extends TestCase
{

    use CreatesActors;
    use DatabaseTransactions;

    public function testAdminRoleHasUserViewAllPermission()
    {
        $admin = $this->createAdmin();
        $this->assertTrue($admin->can('user-view-all'));
    }

    public function testActorWithUserViewAllPermissionCanViewAllUsers()
    {
        $admin = $this->createAdmin();
        $users = $this->createUsers(5);

        $this
            ->actingAs($admin)
            ->visit(route('user.index'));

        foreach ($users as $user) {
            $this->see($user->username);
        }
    }

    public function testActorWithoutUserViewAllPermissionCanViewAllUsers()
    {
        $user = $this->createUser();

        $this
            ->actingAs($user)
            ->get(route('user.index'))
            ->assertResponseStatus(403);
    }
}
