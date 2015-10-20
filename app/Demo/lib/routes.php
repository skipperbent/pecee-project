<?php
/**
 * This file contains all the routes for the project
 */

use Pecee\Router;

Router::get('/', 'ControllerDefault@index');
Router::all('/companies/{id}', 'ControllerDefault@companies');
Router::get('/contact', 'ControllerDefault@contact');

Router::addExceptionHandler('\Demo\Handler\CustomExceptionHandler');