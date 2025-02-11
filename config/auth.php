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
        'guard' => 'web', // Guard padrão (pode ser 'web' ou 'participante' ou 'organizador')
        'passwords' => 'users', // Password reset padrão
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
            'provider' => 'organizadors', // Provider para o organizador
        ],

        'participante' => [ // Guard para o participante
            'driver' => 'session',
            'provider' => 'participantes', // Provider para o participante
        ],

        'organizador' => [ // Guard para o organizador (se necessário)
            'driver' => 'session',
            'provider' => 'organizadors', // Provider para o organizador
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
        'organizadors' => [ // Provider para o organizador
            'driver' => 'eloquent',
            'model' => App\Models\Organizador::class, // Model do organizador
        ],

        'participantes' => [ // Provider para o participante
            'driver' => 'eloquent',
            'model' => App\Models\Participante::class, // Model do participante
        ],

        // 'users' => [ // Exemplo de provider padrão (opcional)
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
        'organizadors' => [ // Password reset para o organizador
            'provider' => 'organizadors',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'participantes' => [ // Password reset para o participante
            'provider' => 'participantes',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        // 'users' => [ // Exemplo de password reset padrão (opcional)
        //     'provider' => 'users',
        //     'table' => 'password_reset_tokens',
        //     'expire' => 60,
        //     'throttle' => 60,
        // ],
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