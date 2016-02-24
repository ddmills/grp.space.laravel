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

        $username = $faker->unique()->userName;
        $password = $faker->password;
        $email = $faker->unique()->email;

        $this
            ->visit(route('auth.register'))
            ->type($username, 'username')
            ->type($password, 'password')
            ->type($email, 'email')
            ->press(Lang::get('user.register.finalize'))
            ->seeInDatabase('users', compact('username', 'email'));
    }

}
