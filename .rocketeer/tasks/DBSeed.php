<?php
namespace CustomTasks;

class DBSeed extends \Rocketeer\Abstracts\AbstractTask
{
    protected $name = 'db-seed';
    protected $description = 'Seed database with --force';

    public function execute()
    {
        $this->runForCurrentRelease('php artisan db:seed --force');
    }
}
