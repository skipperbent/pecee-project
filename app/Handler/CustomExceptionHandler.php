<?php
namespace Demo\Handler;

use Demo\Widget\Page\PageNotFound;
use Pecee\Handler\ExceptionHandler;
use Pecee\Http\Request;
use Pecee\SimpleRouter\RouterEntry;

class CustomExceptionHandler extends ExceptionHandler {

    public function handleError( Request $request, RouterEntry $router = null, \Exception $error) {

        // Return json errors if we encounter an error on the API.
        if(stripos($request->getUri(), '/api') !== false) {
            response()->json(['error' => $error->getMessage()]);
        }

        if($error->getCode() == 404) {
            echo new PageNotFound();
            die();
        }
    }

}