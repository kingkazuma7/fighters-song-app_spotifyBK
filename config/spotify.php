<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | The Client ID and Client Secret of your Spotify App.
    |
    */

    'auth' => [
        'client_id' => env('0c8691af790e449e93d0965f5f79c27f'),
        'client_secret' => env('4c2cf50477a8482c82c14ce5f20cc37f'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Config
    |--------------------------------------------------------------------------
    |
    | You may define a default country, locale and market that will be used
    | for your Spotify API requests.
    |
    */

    'default_config' => [
        'country' => null,
        'locale' => null,
        'market' => null,
    ],

];
