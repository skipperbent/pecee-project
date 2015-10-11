<?php
namespace Demo\Handler;

use Pecee\Handler\ExceptionHandler;
use Pecee\SimpleRouter\RouterEntry;

class CustomExceptionHandler extends ExceptionHandler {

    public function handleError(RouterEntry $route = null, \Exception $error) {
        if($error->getCode() == 404) {
            die('404 side');
        }
    }

}