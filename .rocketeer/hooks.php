<?php

return [
    'before' => [
        'setup'   => [],
        'deploy'  => [],
        'cleanup' => [],
    ],
    'after'  => [
        'setup'   => [],
        'deploy'  => [],
        'cleanup' => [],
    ],
    'custom' => [
        'CustomTasks\CopyEnvironment',
        'CustomTasks\DBMigrate',
        'CustomTasks\DBSeed',
    ],
];
