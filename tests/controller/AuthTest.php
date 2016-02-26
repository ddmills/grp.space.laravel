<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;

class AuthTest extends TestCase
{

    use UserCreator;
    use DatabaseTransactions;

    public function testVisitorCanRegisterAccount()
    {
        $faker = Faker::create();

        $username = $faker->unique()->userName;
        $email = $faker->unique()->email;
        $password = $faker->password;

        $this
            ->visit(route('auth.register'))
            ->type($username, 'username')
            ->type($password, 'password')
            ->type($email, 'email')
            ->press(Lang::get('auth.register.finalize'))
            ->seeInDatabase('users', compact('username', 'email'));
    }

    public function testRegisterAccountFieldsAreRequired()
    {
        $faker = Faker::create();

        $this
            ->visit(route('auth.register'))
            ->type('', 'username')
            ->type('', 'password')
            ->type('', 'email')
            ->press(Lang::get('auth.register.finalize'))
            ->seePageIs(route('auth.register'))
            ->see('The username field is required')
            ->see('The password field is required')
            ->see('The email field is required');
    }

    public function testUserCanLogin()
    {
        $password = 'password';
        $user = $this->createUserWithPassword($password);

        $this
            ->visit(route('auth.login'))
            ->type($user->username, 'username')
            ->type($password, 'password')
            ->press(Lang::get('auth.login.finalize'))
            ->seeAuthenticated($user);
    }

}
