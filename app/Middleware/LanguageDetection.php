<?php
namespace Demo\Middleware;

use Pecee\Cookie;
use Pecee\Http\Middleware\BaseMiddleware;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Route\ILoadableRoute;

class LanguageDetection extends BaseMiddleware {

    protected $supportedLanguages = [
        'da_dk',
        'en_gb'
    ];

    public function handle(Request $request, ILoadableRoute &$route = null){

        $locale = 'en_gb';

        if(Cookie::get('lang')) {
            $locale = Cookie::get('lang');
        }

        if(input()->get('lang') && in_array(strtolower(input()->get('lang')), $this->supportedLanguages)) {
            /* Site main language */
            $locale = input()->get('lang');

            Cookie::create('lang', input()->get('lang'));
        }

        app()->setLocale($locale);

    }
}