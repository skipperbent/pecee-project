<?php
namespace Demo\Handler;

use Pecee\Handler\ExceptionHandler;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\Route\ILoadableRoute;

class CustomExceptionHandler extends ExceptionHandler {

    public function handleError( Request $request, ILoadableRoute &$route = null, \Exception $error) {

        // Return json errors if we encounter an error on the API.
        if(stripos($request->getUri(), '/api') !== false) {
            response()->json(['error' => $error->getMessage()]);
        }

        if($error instanceof NotFoundHttpException) {
            $request->setUri(url('page.notfound'));
            return $request;
        }

        throw $error;

    }

}