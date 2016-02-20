<?php
namespace CustomTasks;

class Gulp extends \Rocketeer\Abstracts\AbstractTask
{
    protected $name = 'gulp';
    protected $description = 'Compile public assets (gulp)';

    public function execute()
    {
        $this->runForCurrentRelease('./node_modules/.bin/gulp');
    }
}
