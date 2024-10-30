<?php

namespace Demo\Middleware;

use Pecee\Http\Middleware\BaseCsrfVerifier;

class CsrfVerifier extends BaseCsrfVerifier
{

    /**
     * CSRF validation will be ignored on the following urls.
     */
    protected array $except = ['/api/*'];

}