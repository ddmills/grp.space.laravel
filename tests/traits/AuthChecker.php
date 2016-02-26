<?php

use App\User;

trait AuthChecker
{
    public function seeAuthenticated($user)
    {
        $this->assertIsTrue(Auth::check());
        $this->assertEqual($user->id, Auth::user()->id);

        return $this;
    }
}
