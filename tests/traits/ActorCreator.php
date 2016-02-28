<?php

use App\User;

trait ActorCreator
{
    public function createActor($attributes = [])
    {
        return factory(User::class)->create($attributes);
    }

    public function createActorWithRole($role, $attributes = [])
    {
        $user = $this->createActor($attributes);

        $user->assignRole($role);
        $user->save();

        return $user;
    }

    public function createUser($attributes = [])
    {
        return $this->createActorWithRole('user', $attributes);
    }

    public function createAdmin($attributes = [])
    {
        return $this->createActorWithRole('admin', $attributes);
    }

    public function createActorWithPassword($password, $attributes = [])
    {
        $attributes['password'] = bcrypt($password);
        return factory(User::class)->create($attributes);
    }

    public function createActors($count = 3, $attributes = [])
    {
        return factory(User::class, $count)->create($attributes);
    }

    public function makeActor($attributes = [])
    {
        return factory(User::class)->make($attributes);
    }

    public function makeActorWithPassword($password, $attributes = [])
    {
        $attributes['password'] = bcrypt($password);
        return factory(User::class)->make($attributes);
    }

    public function makeActors($count = 3, $attributes = [])
    {
        return factory(User::class, $count)->make($attributes);
    }

}