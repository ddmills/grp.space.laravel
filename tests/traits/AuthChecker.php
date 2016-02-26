<?php

use App\User;

trait AuthChecker
{
    public function seeAuthenticated($user)
    {
        $this->assertTrue(Auth::check());
        $this->assertEquals($user->id, Auth::user()->id);

        return $this;
    }
}
