<?php
namespace CustomTasks;

class DBMigrate extends \Rocketeer\Abstracts\AbstractTask
{
    protected $name = 'db-migrate';
    protected $description = 'Migrate database with --force';

    public function execute()
    {
        $this->runForCurrentRelease('php artisan migrate --force -n');
    }
}
