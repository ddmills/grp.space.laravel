<?php

return [

    'create' => [
        'finalize' => 'Create room',
        'header' => 'Create a new room',
        'tagline' => 'A room is a stellar hangout space for you and your friends.',
        'err' => [
            'name' => 'A room name must be entered.',
        ]
    ],

    'joined' => [
        'success' => 'Welcome to :roomname!',
        'failure' => 'Could not join room. Expired/Invalid token. Get a new invite!',
    ],

    'invite' => [
        'success' => '":username" has been invited to join.',
        'failure' => '":username" could not be invited.',
        'notfound' => 'User with email or username ":identifier" could not be found.'
    ]

];
