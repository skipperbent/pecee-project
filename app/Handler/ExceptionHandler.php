<?php
namespace Demo\Handler;

use Demo\Middleware\LanguageDetection;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\Route\RouteUrl;

class ExceptionHandler extends \Pecee\Handler\ExceptionHandler
{

    public function handleError(Request $request, \Exception $error)
    {
        // Return json errors if we encounter an error on the API.
        if (stripos($request->getUrl()->getPath(), '/api') !== false) {
            response()->json(['error' => $error->getMessage()]);
        }

        if ($error instanceof NotFoundHttpException) {

            $route = new RouteUrl(url(), 'PageController@notFound');
            $route->setMiddleware(LanguageDetection::class);

            $request->setRewriteRoute($route);

            return $request;
        }

        throw $error;

    }

}