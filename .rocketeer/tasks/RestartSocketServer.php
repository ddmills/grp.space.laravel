<?php
namespace CustomTasks;

class RestartSocketServer extends \Rocketeer\Abstracts\AbstractTask
{
    protected $name = 'socket-restart';
    protected $description = 'Restart socket.js server';

    public function execute()
    {
        $this->runForCurrentRelease('forever stop socket-serve');
        $this->runForCurrentRelease('forever start --uid "socket-serve" --append socket.js');
    }
}
