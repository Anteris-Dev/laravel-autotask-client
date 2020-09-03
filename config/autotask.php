<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Autotask Username
    |--------------------------------------------------------------------------
    |
    | This value is the username of your api user. This value is used when the
    | framework needs to place a request to Autotask.
    |
    */
    'username' => env('AUTOTASK_USERNAME', 'autotask@example.com'),

    /*
    |--------------------------------------------------------------------------
    | Autotask Password
    |--------------------------------------------------------------------------
    |
    | This value is the password of your api user. This value is used when the
    | framework needs to place a request to Autotask.
    |
    */
    'password' => env('AUTOTASK_PASSWORD', null),

    /*
    |--------------------------------------------------------------------------
    | Autotask Integration Code
    |--------------------------------------------------------------------------
    |
    | This value is the integration code of your api. This value is used when the
    | framework needs to place a request to Autotask and identifies which API is 
    | issuing the request.
    |
    */
    'integration_code' => env('AUTOTASK_INTEGRATION_CODE', null),

    /*
    |--------------------------------------------------------------------------
    | Autotask Zone URL
    |--------------------------------------------------------------------------
    |
    | This value is the URL for your api zone. This URL is used when the
    | framework needs to place a request to Autotask.
    |
    */
    'zone_url' => env('AUTOTASK_ZONE_URL', null),

];
