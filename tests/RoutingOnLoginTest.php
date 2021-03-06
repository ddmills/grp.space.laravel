<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoutingOnLoginTest extends TestCase
{

    use CreatesActors;
    use DatabaseTransactions;

    public function testUserIsRoutedHomeIfUserHasNoRooms()
    {
        $password = 'password';
        $user = $this->createUser(['password' => Hash::make($password)]);

        $this
            ->visit(route('auth.login'))
            ->type($user->email, 'identifier')
            ->type($password, 'password')
            ->press(Lang::get('auth.login.finalize'))
            ->seePageIs(route('home'));
    }

    public function testUserIsRoutedToRoomShowIfHasARoom()
    {
        $password = 'password';
        $user = $this->createUserWithRoom(['password' => Hash::make($password)]);
        $room = $user->rooms->first();

        $this
            ->visit(route('auth.login'))
            ->type($user->email, 'identifier')
            ->type($password, 'password')
            ->press(Lang::get('auth.login.finalize'))
            ->seePageIs(route('room.show', $room->name));
    }

    public function testUserIsSeesUserRoomIndexIfHasMultipleRooms() {
        $password = 'password';
        $user = $this->createUserWithRooms(2, ['password' => Hash::make($password)]);
        $firstRoom = $user->rooms[0];
        $otherRoom = $user->rooms[1];

        $this
            ->visit(route('auth.login'))
            ->type($user->email, 'identifier')
            ->type($password, 'password')
            ->press(Lang::get('auth.login.finalize'))
            ->see($firstRoom->name)
            ->see($otherRoom->name);
    }
}
