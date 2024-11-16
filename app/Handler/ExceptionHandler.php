<?php

namespace Demo\Handler;

use Demo\Middleware\LanguageDetection;
use Pecee\Exceptions\ValidationException;
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
            switch ($error) {
                case $error instanceof ValidationException:
                {
                    response()->httpCode(400);
                    response()->json([
                        'success' => false,
                        'errors' => $error->getErrors() ?? [$error->getMessage()],
                        'code' => $error->getCode() === 0 ? 400 : $error->getCode(),
                    ]);
                }
                default:
                {
                    response()->httpCode(400);
                    response()->json([
                        'success' => false,
                        'errors' => [$error->getMessage()],
                        'code' => $error->getCode() === 0 ? 400 : $error->getCode(),
                    ]);
                }
            }
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