<?php

use App\User;

trait UserCreator
{
    public function createUser()
    {
        return factory(User::class)->create();
    }

    public function createUsers($count = 3)
    {
        return factory(User::class, $count)->create();
    }
}
