<?php
/**
 * This file contains all the routes for the project
 */

use Pecee\Application\Router;

Router::csrfVerifier(new \Demo\Middleware\CsrfVerifier());

Router::group(['exceptionHandler' => Demo\Handler\ExceptionHandler::class], function() {

    Router::group(['middleware' => Demo\Middleware\LanguageDetection::class], function() {

        Router::get('/', 'DefaultController@index')->setName('home');
        Router::basic('/companies/{id?}', 'DefaultController@companies')->setName('companies');
        Router::get('/contact', 'PageController@contact')->setName('page.contact');

    });

    // Api
    Router::group(['prefix' => '/api'], function() {
        Router::resource('/company', 'Api\CompanyController');
    });

});