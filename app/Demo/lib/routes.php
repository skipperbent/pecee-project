<?php
/**
 * This file contains all the routes for the project
 */

use Pecee\Router;

Router::get('/', 'ControllerDefault@index');

Router::addExceptionHandler('\Demo\Handler\CustomExceptionHandler');