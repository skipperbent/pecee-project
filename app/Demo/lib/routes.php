<?php
/**
 * This file contains all the routes for the project
 */

use Pecee\Router;

Router::csrfVerifier(new \Demo\Middleware\CsrfVerifier());
Router::setDefaultExceptionHandler('\Demo\Handler\CustomExceptionHandler');

Router::get('/', 'ControllerDefault@index')->setAlias('home');
Router::get('/contact', 'ControllerDefault@contact')->setAlias('contact');
Router::match(['get', 'post'], '/companies', 'ControllerDefault@companies')->setAlias('companies');
Router::match(['get', 'post'], '/companies/{id}', 'ControllerDefault@companies')->setAlias('companies');