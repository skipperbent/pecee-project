<?php
/**
 * This file contains all the routes for the project
 */

use Pecee\Router;

Router::csrfVerifier(new \Demo\Middleware\CsrfVerifier());
Router::defaultExceptionHandler('\Demo\Handler\CustomExceptionHandler');

Router::group(['middleware' => 'Demo\Middleware\LanguageDetection'], function() {

    Router::get('/', 'DefaultController@index')->setAlias('home');
    Router::get('/contact', 'DefaultController@contact')->setAlias('contact');
    Router::basic('/companies', 'DefaultController@companies')->setAlias('companies');
    Router::basic('/companies/{id}', 'DefaultController@companies')->setAlias('companies');

});

// Api

Router::group(['prefix' => '/api'], function() {
    Router::resource('/companies', 'Api\\CompanyController');
});