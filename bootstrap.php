<?php
$abspath = __DIR__ . DIRECTORY_SEPARATOR;
set_include_path($abspath . PATH_SEPARATOR . $abspath . 'app' . DIRECTORY_SEPARATOR);

require_once 'vendor/pecee/framework/boot.php';

if (app()->getDebugEnabled() === true) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}

$app = [];

require_once 'config/app.php';

if (isset($app['db']) === true) {
    app()->db = new \Pecee\Pixie\Connection($app['db']['driver'], $app['db']);

    if (app()->getDebugEnabled() === true) {

        app()->db->registerEvent('before-*', null, function (\Pecee\Pixie\Event\EventArguments $e) {
            debug('START QUERY: ' . $e->getQuery()->getRawSql());
        });

        app()->db->registerEvent('after-*', null, function (\Pecee\Pixie\Event\EventArguments $e) {
            debug('END QUERY: ' . $e->getQuery()->getRawSql());
        });
    }
}

if (count(app()->getModules()) > 0) {

    spl_autoload_register(function ($class) {
        $file = explode('\\', $class);
        $app = array_shift($file);
        $file = join(DIRECTORY_SEPARATOR, $file) . '.php';

        $module = app()->getModule($app);

        if ($module !== null) {
            require_once $module . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $file;
        }

    });
}

use Pecee\Application\Router;

Router::init();

require_once __DIR__ . '/routes/web.php';

if (PHP_SAPI === 'cli') {
    /* Load routes so url() can be used in cli-mode */
    Router::router()->loadRoutes();
}