<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    use DatabaseTransactions;

    public function testHomeShowsSiteName()
    {
        $this
            ->visit(route('home'))
            ->see('grp.space');
    }

    public function testHomePageLinksToRoomCreate()
    {
        $this
            ->visit(route('home'))
            ->seeElementHasAttribute('a', 'href', route('room.create'));
    }

}
