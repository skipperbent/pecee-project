<?php
namespace Demo\Middleware;

use Pecee\Cookie;
use Pecee\Http\Middleware\BaseMiddleware;
use Pecee\Http\Request;
use Pecee\Locale;

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

        if($this->input('lang') && in_array(strtolower($this->input('lang')), $this->supportedLanguages)) {
            /* Site main language */
            $locale = $this->input('lang');

            Cookie::create('lang', $this->input('lang'));
        }

        Locale::getInstance()->setLocale($locale);
        Locale::getInstance()->setDefaultLocale($locale);

    }
}