<?php

use App\User;

trait UserCreator
{
    public function createUser($attributes = [])
    {
        return factory(User::class)->create($attributes);
    }

    public function createUserWithPassword($password, $attributes = [])
    {
        $attributes['password'] = bcrypt($password);
        return factory(User::class)->create($attributes);
    }

    public function createUsers($count = 3, $attributes = [])
    {
        return factory(User::class, $count)->create($attributes);
    }
}
