<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;

class AuthTest extends TestCase
{

    use CreatesActors;
    use AuthChecker;
    use DatabaseTransactions;

    public function testVisitorCanRegisterAccount()
    {
        $faker = Faker::create();

        $password = $faker->password;
        $actor = $this->makeActor();

        $this
            ->visit(route('auth.register'))
            ->type($actor->username, 'username')
            ->type($password, 'password')
            ->type($actor->email, 'email')
            ->press(Lang::get('auth.register.finalize'))
            ->seeInDatabase('users', compact('username', 'email'));

        $user = User::where('username', $actor->username)->first();
        $this->assertTrue($user->hasRole('user'));
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

    public function testCanLoginWithUsername()
    {
        $password = 'password';
        $user = $this->createActorWithPassword($password);

        $this
            ->visit(route('auth.login'))
            ->type($user->username, 'identifier')
            ->type($password, 'password')
            ->press(Lang::get('auth.login.finalize'))
            ->seeAuthenticated($user)
            ->dontSeeInElement('.app-navigation', 'Sign in');
    }

    public function testCanLoginWithEmail()
    {
        $password = 'password';
        $user = $this->createActorWithPassword($password);

        $this
            ->visit(route('auth.login'))
            ->type($user->email, 'identifier')
            ->type($password, 'password')
            ->press(Lang::get('auth.login.finalize'))
            ->seeAuthenticated($user)
            ->dontSeeInElement('.app-navigation', 'Sign in');
    }

}
