<?php

return [
    'twitch' => [
        'client_id' => 'miztc6t5uwudryg94pqz5hm0s3vcw8',
        'redirect_uri' => 'http://localhost/twitch',
        'response_type' => 'token',
        'scope' => 'channel:read:subscriptions chat:read',
        'token_type' => 'bearer'
    ],
    'webhooks' => [
        'hub.callback' => 'https://mrgreen-twitch-api.herokuapp.com/notification'
    ],
    'sqlite' => '/app/db/sqlite/database.sqlite',
];