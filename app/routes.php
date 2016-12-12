<?php
/**
 * This file contains all the routes for the project
 */

use Pecee\Application\Router;

Router::csrfVerifier(new \Demo\Middleware\CsrfVerifier());

Router::group(['exceptionHandler' => '\Demo\Handler\CustomExceptionHandler'], function() {

    Router::group(['middleware' => 'Demo\Middleware\LanguageDetection'], function() {

        Router::get('/', 'DefaultController@index')->setName('home');
        Router::get('/contact', 'DefaultController@contact')->setName('contact');
        Router::get('/404', 'DefaultController@notFound')->setName('page.notfound');
        Router::basic('/companies', 'DefaultController@companies')->setName('companies');
        Router::basic('/companies/{id}', 'DefaultController@companies')->setName('companies');

    });

// Api

    Router::group(['prefix' => '/api'], function() {
        Router::resource('/companies', 'Api\\CompanyController');
    });

});