<?php

namespace Demo\Handler;

use Demo\Middleware\LanguageDetection;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\Route\RouteUrl;

class ExceptionHandler extends \Pecee\Handler\ExceptionHandler
{

    /**
     * @param Request $request
     * @param \Exception $error
     * @throws \Exception
     */
    public function handleError(Request $request, \Exception $error): void
    {
        // Return json errors if we encounter an error on the API.
        if (stripos($request->getUrl()->getPath(), '/api') !== false) {
            response()->json(['error' => $error->getMessage()]);
        }

        if ($error instanceof NotFoundHttpException) {

            $route = new RouteUrl(url(), 'PageController@notFound');
            $route->addMiddleware(LanguageDetection::class);

            $request->setRewriteRoute($route);

            return;
        }

        throw $error;

    }

}