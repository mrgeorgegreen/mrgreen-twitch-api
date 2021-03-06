<?php

return [
    'twitch' => [
        'client_id' => '8h5hefxsn94rxcvj37pib6aepnucla',
        'redirect_uri' => 'https://mrgreen-twitch-api.herokuapp.com/twitch',
        'response_type' => 'token',
        'scope' => 'channel:read:subscriptions chat:read user:read:email',
        'token_type' => 'bearer'
    ],
    'webhooks' => [
        'hub.callback' => 'https://mrgreen-twitch-api.herokuapp.com/notification'
    ],
    'sqlite' => '/app/db/sqlite/database.sqlite',
];
