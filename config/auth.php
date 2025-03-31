<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | You may define every authentication guard for your application here.
    | A great default configuration has been defined for you using session storage
    | and the Eloquent user provider.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        // Guard dành cho nhân viên/quản trị viên
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Guard dành cho khách hàng
        'customer' => [
            'driver' => 'session',
            'provider' => 'customers',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication guards have a user provider. This defines how the
    | users are retrieved out of your database or storage systems used
    | by this application to persist your user's data.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        // Provider cho bảng users (nhân viên/quản trị viên)
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Provider cho bảng customer (khách hàng)
        'customers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Customer::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Here you may define multiple password reset configurations if you have
    | more than one user table or model in the application and you want to
    | have separate password reset settings based on the specific user types.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'customers' => [
            'provider' => 'customers',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | The amount of seconds before a password confirmation expires.
    | By default, this lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
