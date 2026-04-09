<?php

return [

    'defaults' => [
        'guard'     => 'web',
        'passwords' => 'karyawan',
    ],

    'guards' => [
        'web' => [
            'driver'   => 'session',
            'provider' => 'karyawan',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Single user table (karyawan) covers all roles:
    |   Manajer, Koki, Pelayan, and Meja (table login).
    |--------------------------------------------------------------------------
    */
    'providers' => [
        'karyawan' => [
            'driver' => 'eloquent',
            'model'  => App\Models\Karyawan::class,
        ],
    ],

    'passwords' => [
        'karyawan' => [
            'provider' => 'karyawan',
            'table'    => 'password_resets',
            'expire'   => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
