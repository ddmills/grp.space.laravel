<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionUserViewAllDashboardTest extends TestCase
{

    use CreatesActors;
    use DatabaseTransactions;

    public function testAdminRoleHasUserViewAllDashboardPermission()
    {
        $admin = $this->createAdmin();
        $this->assertTrue($admin->can('user-view-all-dashboard'));
    }

    public function testUserWithUserViewAllDashboardPermissionCanViewOtherUserDashboards()
    {
        $admin = $this->createAdmin();
        $otherUser = $this->createUser();

        $this
            ->actingAs($admin)
            ->visit(route('user.dashboard', $otherUser->username))
            ->assertResponseStatus(200);
    }

    public function testUserWithoutUserViewAllDashboardPermissionCantViewDashboard()
    {
        $user = $this->createUser();

        $this
            ->get(route('user.dashboard', $user->username))
            ->assertResponseStatus(403);
    }
}
