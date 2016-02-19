<?php

use Rocketeer\Services\Connections\ConnectionsHandler;

return [
    'application_name' => 'grp.space',
    'plugins' => [],

    'logs' => function (ConnectionsHandler $connections) {
        return sprintf('%s-%s-%s.log', $connections->getConnection(), $connections->getStage(), date('Ymd'));
    },

    'default' => ['production'],

    'connections' => [
        'production' => [
            'host'      => '52.26.73.218',
            'username'  => 'ubuntu',
            'password'  => '',
            'key'       => '/Users/dmills/.ssh/trash-society',
            'keyphrase' => '',
            'agent'     => '',
            'db_role'   => true,
        ],
    ],

    'use_roles' => false,

    'on' => [
        'stages'      => [],
        'connections' => [],
    ],

];
