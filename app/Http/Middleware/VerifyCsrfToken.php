<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'https://random-coffee.app/5570824772:AAF7HpOHd-1QgF7EHI7e1C5GO_B6Mgzaapc/webhookHandler'
    ];
}
