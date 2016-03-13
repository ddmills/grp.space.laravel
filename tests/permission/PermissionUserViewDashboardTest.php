<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionUserViewDashboardTest extends TestCase
{

    use CreatesActors;
    use DatabaseTransactions;

    public function testUserRoleHasUserViewDashboardPermission()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('user-view-dashboard'));
    }

    public function testUserWithUserViewDashboardPermissionCanViewOwnDashboard()
    {
        $user = $this->createUser();

        $this
            ->actingAs($user)
            ->visit(route('user.dashboard', $user->username))
            ->assertResponseStatus(200);
    }

    public function testUserWithUserViewDashboardPermissionCantViewOtherUserDashboard()
    {
        $user = $this->createUser();
        $otherUser = $this->createUser();

        $this
            ->actingAs($user)
            ->get(route('user.dashboard', $otherUser->username))
            ->assertResponseStatus(403);
    }

    public function testUserWithoutUserViewDashboardPermissionCantViewDashboard()
    {
        $user = $this->createUser();

        $this
            ->get(route('user.dashboard', $user->username))
            ->assertResponseStatus(403);
    }
}
