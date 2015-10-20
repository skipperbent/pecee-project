<?php
/**
 * This file contains all the routes for the project
 */

use Pecee\Router;

Router::get('/', 'ControllerDefault@index')->setAlias('home');
Router::all('/companies/{id}', 'ControllerDefault@companies')->setAlias('companies');
Router::get('/contact', 'ControllerDefault@contact')->setAlias('contact');

Router::addExceptionHandler('\Demo\Handler\CustomExceptionHandler');