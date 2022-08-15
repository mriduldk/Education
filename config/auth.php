<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users'
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'chd' => [
            'driver' => 'session',
            'provider' => 'c_h_d_s',
        ],
        'is' => [
            'driver' => 'session',
            'provider' => 'i_s',
        ],
        'dpc' => [
            'driver' => 'session',
            'provider' => 'd_p_c_s',
        ],
        'dmc' => [
            'driver' => 'session',
            'provider' => 'd_m_c_s',
        ],
        'deeo' => [
            'driver' => 'session',
            'provider' => 'd_e_e_o_s',
        ],
        'manager' => [
            'driver' => 'session',
            'provider' => 'managers',
        ],
        'approver' => [
            'driver' => 'session',
            'provider' => 'approvers',
        ],
        'deo' => [
            'driver' => 'session',
            'provider' => 'd_e_o_s',
        ],
        'bmc' => [
            'driver' => 'session',
            'provider' => 'b_m_c_s',
        ],
        'beeo' => [
            'driver' => 'session',
            'provider' => 'b_e_e_o_s',
        ],
        'di' => [
            'driver' => 'session',
            'provider' => 'd_i_s',
        ],
        'teacher' => [
            'driver' => 'session',
            'provider' => 'teachers',
        ],
        'headTeacher' => [
            'driver' => 'session',
            'provider' => 'teachers',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'c_h_d_s' => [
            'driver' => 'eloquent',
            'model' => App\Models\CHD::class,
        ],

        'i_s' => [
            'driver' => 'eloquent',
            'model' => App\Models\IS::class,
        ],

        'd_p_c_s' => [
            'driver' => 'eloquent',
            'model' => App\Models\DPC::class,
        ],

        'd_m_c_s' => [
            'driver' => 'eloquent',
            'model' => App\Models\DMC::class,
        ],

        'd_e_e_o_s' => [
            'driver' => 'eloquent',
            'model' => App\Models\DEEO::class,
        ],

        'managers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Manager::class,
        ],

        'approvers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Approver::class,
        ],

        'd_e_o_s' => [
            'driver' => 'eloquent',
            'model' => App\Models\DEO::class,
        ],

        'b_m_c_s' => [
            'driver' => 'eloquent',
            'model' => App\Models\BMC::class,
        ],

        'b_e_e_o_s' => [
            'driver' => 'eloquent',
            'model' => App\Models\BEEO::class,
        ],

        'd_i_s' => [
            'driver' => 'eloquent',
            'model' => App\Models\DI::class,
        ],

        'teachers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Teacher::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'c_h_d_s' => [
            'provider' => 'c_h_d_s',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'i_s' => [
            'provider' => 'i_s',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'd_p_c_s' => [
            'provider' => 'd_p_c_s',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'd_m_c_s' => [
            'provider' => 'd_m_c_s',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'd_e_e_o_s' => [
            'provider' => 'd_e_e_o_s',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'managers' => [
            'provider' => 'managers',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'approvers' => [
            'provider' => 'approvers',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'd_e_o_s' => [
            'provider' => 'd_e_o_s',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'b_m_c_s' => [
            'provider' => 'b_m_c_s',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'b_e_e_o_s' => [
            'provider' => 'b_e_e_o_s',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'd_i_s' => [
            'provider' => 'd_i_s',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'teachers' => [
            'provider' => 'teachers',
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
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
