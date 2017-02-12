<?php
namespace Demo\Middleware;

use Pecee\Cookie;
use Pecee\Http\Middleware\BaseMiddleware;
use Pecee\Http\Request;

class LanguageDetection extends BaseMiddleware {

    protected $supportedLanguages = [
        'da_dk',
        'en_gb'
    ];

    public function handle(Request $request){

        $locale = 'en_gb';

        if(Cookie::get('lang')) {
            $locale = Cookie::get('lang');
        }

        if(input()->get('lang') && in_array(strtolower(input()->get('lang')), $this->supportedLanguages) === true) {
            /* Site main language */
            $locale = input()->get('lang');

            Cookie::create('lang', input()->get('lang'));
        }

        app()->setLocale($locale);

    }
}