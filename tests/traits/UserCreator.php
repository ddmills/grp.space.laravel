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

    public function makeUser($attributes = [])
    {
        return factory(User::class)->make($attributes);
    }

    public function makeUserWithPassword($password, $attributes = [])
    {
        $attributes['password'] = bcrypt($password);
        return factory(User::class)->make($attributes);
    }

    public function makeUsers($count = 3, $attributes = [])
    {
        return factory(User::class, $count)->make($attributes);
    }
}
