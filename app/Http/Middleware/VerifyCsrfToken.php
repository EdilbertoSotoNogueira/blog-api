<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{

    protected $except = [

        'api',
        'api/*',
        'http://127.0.0.1:8000/users/create',
        'http://127.0.0.1:8000/*',
        'app/*'
    ];
}
