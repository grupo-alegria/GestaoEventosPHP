<?php

return [
    'defaults' => [
        'guard' => 'web', // Guard padrão
        'passwords' => 'users', // Password reset padrão
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'organizadors', // Provider para o organizador
        ],

        'participante' => [ // Guard para o participante
            'driver' => 'session',
            'provider' => 'participantes', // Provider para o participante
        ],

        'organizador' => [ // Guard para o organizador
            'driver' => 'session',
            'provider' => 'organizadors', // Provider para o organizador
        ],
    ],

    'providers' => [
        'organizadors' => [ // Provider para o organizador
            'driver' => 'eloquent',
            'model' => App\Models\Organizador::class, // Model do organizador
        ],

        'participantes' => [ // Provider para o participante
            'driver' => 'eloquent',
            'model' => App\Models\Participante::class, // Model do participante
        ],
    ],

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
    ],

    'password_timeout' => 10800,
];