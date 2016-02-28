<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FirstTimeStepsTest extends TestCase
{
    use Crawler;
    use ActorCreator;

    public function testStepsAreShownOnHomepage()
    {
        $this
            ->visit(route('home'))
            ->seeElement('.starting-steps')
            ->seeInElement('.starting-steps > .step.active', 'Step 1');
    }

    public function testStepsAreShownOnRegistrationPage()
    {
        $this
            ->visit(route('auth.register'))
            ->seeElement('.starting-steps')
            ->seeInElement('.starting-steps > .step.active', 'Step 1');
    }

    public function testStepsAreShownOnRoomCreatePage()
    {
        $this
            ->actingAs($this->createUser())
            ->visit(route('room.create'))
            ->seeElement('.starting-steps')
            ->seeInElement('.starting-steps > .step.active', 'Step 2');
    }
}
