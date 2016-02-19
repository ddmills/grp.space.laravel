<?php
namespace CustomTasks;

class CopyEnvironment extends \Rocketeer\Abstracts\AbstractTask
{
    protected $name = 'task-copyenv';
    protected $description = 'Copies the server .env file to current build';

    public function execute()
    {
        $origin      = $this->paths->getHomeFolder();
        $destination = $this->releasesManager->getCurrentReleasePath();

        $source  = $origin . '/env/.env.production';
        $target  = $destination . '/.env';

        $this->copy($source, $target);
    }
}
