<?php
/**
 * This file contains all the routes for the project
 */

use Pecee\Router;

Router::csrfVerifier(new \Demo\Middleware\CsrfVerifier());

Router::group(['exceptionHandler' => '\Demo\Handler\CustomExceptionHandler'], function() {

    Router::group(['middleware' => 'Demo\Middleware\LanguageDetection'], function() {

        Router::get('/', 'DefaultController@index')->setAlias('home');
        Router::get('/contact', 'DefaultController@contact')->setAlias('contact');
        Router::get('/404', 'DefaultController@notFound')->setAlias('page.notfound');
        Router::basic('/companies', 'DefaultController@companies')->setAlias('companies');
        Router::basic('/companies/{id}', 'DefaultController@companies')->setAlias('companies');

    });

// Api

    Router::group(['prefix' => '/api'], function() {
        Router::resource('/companies', 'Api\\CompanyController');
    });

});