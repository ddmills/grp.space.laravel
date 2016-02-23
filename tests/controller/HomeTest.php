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

    public function testThatCurrentEnvReleaseIsDisplayedInFooter()
    {
        $this
            ->visit(route('home'))
            ->seeInElement('.app-footer', env('RELEASE'));
    }

}
