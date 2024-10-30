<?php

namespace Demo\Middleware;

use Pecee\Cookie;
use Pecee\Http\Middleware\BaseMiddleware;
use Pecee\Http\Request;

class LanguageDetection extends BaseMiddleware
{
    protected array $supportedLanguages = [
        'da_dk',
        'en_gb',
    ];

    public function handle(Request $request): void
    {
        $locale = Cookie::get('lang', 'en_gb');

        if (input('lang') && \in_array(strtolower(input('lang')), $this->supportedLanguages, true) === true) {
            /* Site main language */
            $locale = input('lang');

            Cookie::create('lang', input('lang'));
        }

        app()->setLocale($locale);

    }
}