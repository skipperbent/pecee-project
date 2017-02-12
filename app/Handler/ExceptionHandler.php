<?php
namespace Demo\Handler;

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;

class ExceptionHandler extends \Pecee\Handler\ExceptionHandler {

    public function handleError( Request $request, \Exception $error) {

        // Return json errors if we encounter an error on the API.
        if(stripos($request->getUri(), '/api') !== false) {
            response()->json(['error' => $error->getMessage()]);
        }

        if($error instanceof NotFoundHttpException) {
            $request->setRewriteUrl(url('page.notfound'));
            return $request;
        }

        throw $error;

    }

}