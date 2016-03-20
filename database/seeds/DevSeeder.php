<?php

use App\Models\User;
use App\Models\Room;
use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        DB::table('users')->delete();
        DB::table('rooms')->delete();

        $neroUser = factory(User::class)->create([
            'username' => 'nero',
            'name' => 'Nero Germanicus',
            'password' => Hash::make('password'),
            'email' => 'nero@grp.space',
        ]);

        $neroUser->assignRole('admin');

        $user = factory(User::class)->create([
            'username' => 'user',
            'name' => 'Tiberius',
            'password' => Hash::make('password'),
            'email' => 'user@grp.space',
        ]);

        $user->assignRole('user');

        $adminUser = factory(User::class)->create([
            'username' => 'admin',
            'name' => 'Julius Caesar',
            'password' => Hash::make('password'),
            'email' => 'admin@grp.space',
        ]);

        $adminUser->assignRole('admin');

        for ($i = 0; $i <= rand(15, 30); $i++) {
            $fillUser = $this->createUser();
            for ($j = 0; $j <= rand(0, 6); $j++) {
                $randRoom = Room::orderByRaw("RAND()")->first();
                if ($randRoom && $randRoom->owner->id != $fillUser->id) {
                    $randRoom->addMember($fillUser);
                }
            }
            for ($j = 0; $j <= rand(0, 4); $j++) {
                $room = factory(Room::class)->create();
                $room->setOwner($fillUser);
                for ($k = 0; $k <= rand(1, 4); $k++) {
                    $room->addMember($this->createUser());
                }
            }
        }

        for ($i = 0; $i <= rand(3, 6); $i++) {
            $randRoom = Room::orderByRaw("RAND()")->first();
            $randRoom->setOwner($neroUser);
        }

        for ($i = 0; $i <= rand(3, 6); $i++) {
            $randRoom = Room::orderByRaw("RAND()")->first();
            if ($randRoom && $randRoom->owner->id != $neroUser->id) {
                $randRoom->addMember($neroUser);
                $randRoom->addMember($user);
            }
        }

        for ($i = 0; $i <= rand(3, 6); $i++) {
            $randRoom = Room::orderByRaw("RAND()")->first();
            if ($randRoom && $randRoom->owner->id != $adminUser->id) {
                $randRoom->addMember($adminUser);
            }
        }

    }

    function createUser()
    {
        $user = factory(User::class)->create();
        $user->assignRole('user');
        return $user;
    }
}
