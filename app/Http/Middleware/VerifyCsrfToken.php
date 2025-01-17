<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Support\Facades\Log;
use Closure; // Tambahkan ini untuk mengimpor Closure
use Illuminate\Http\Request; // Pastikan juga Request diimpor jika diperlukan

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'login',
        'register',
        'api/*',
        'login.action',
    ];

    
}
