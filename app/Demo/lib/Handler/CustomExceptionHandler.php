<?php
namespace Demo\Handler;

use Demo\Widget\Page\PageNotFound;
use Pecee\Handler\ExceptionHandler;
use Pecee\Http\Request;
use Pecee\SimpleRouter\RouterEntry;

class CustomExceptionHandler extends ExceptionHandler {

    public function handleError( Request $request, RouterEntry $router = null, \Exception $error) {
        if($error->getCode() == 404) {
            echo new PageNotFound();
            die();
        }
    }

}