<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;

class AuthTest extends TestCase
{

    public function testVisitorCanCreateAccount()
    {
        $faker = Faker::create();

        $userData = [
            'username' => $faker->unique()->userName,
            'password' => $faker->password,
            'email' => $faker->unique()->email,
        ];

        $this
            ->visit(route('auth.register'))
            ->type($userData['username'], 'username')
            ->type($userData['password'], 'password')
            ->type($userData['email'], 'email')
            ->press(Lang::get('user.create.finalize'))
            ->seeInDatabase('users', $userData);
    }

}
