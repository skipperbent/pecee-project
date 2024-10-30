<?php
/**
 * This file contains all the routes for the project
 */

use Pecee\Application\Router;

Router::csrfVerifier(new \Demo\Middleware\CsrfVerifier());

Router::group(['exceptionHandler' => Demo\Handler\ExceptionHandler::class], static function () {

    Router::group(['middleware' => Demo\Middleware\LanguageDetection::class], static function () {

        Router::get('/', 'DefaultController@index')->setName('home');
        Router::basic('/companies/{id?}', 'DefaultController@companies')->setName('companies');
        Router::get('/contact', 'PageController@contact')->setName('page.contact');

    });

    // Api
    Router::group(['prefix' => '/api'], static function () {
        Router::resource('/companies', 'Api\CompanyController');
    });

});