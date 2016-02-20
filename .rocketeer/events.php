<?php

use Rocketeer\Facades\Rocketeer;

Rocketeer::after('CreateRelease', 'CustomTasks\CopyEnvironment');
Rocketeer::after('Dependencies', 'CustomTasks\DBMigrate');
Rocketeer::after('Dependencies', 'CustomTasks\DBSeed');
Rocketeer::after('Dependencies', 'CustomTasks\Gulp');
