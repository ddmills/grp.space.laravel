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
}
