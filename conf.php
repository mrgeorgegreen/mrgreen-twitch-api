<?php
return([
    'twitch' => [
        'client_id' => '8h5hefxsn94rxcvj37pib6aepnucla',
        'redirect_uri' => 'https://mrgreen-twitch-api.herokuapp.com?twitch=true',
        'response_type' => 'token',
        'scope' => 'channel:read:subscriptions chat:read',
        'token_type' => 'bearer'
    ]
]);