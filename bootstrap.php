<?php
$abspath = __DIR__ . DIRECTORY_SEPARATOR;
set_include_path($abspath . PATH_SEPARATOR . $abspath . 'app' . DIRECTORY_SEPARATOR);

require_once 'vendor/pecee/framework/boot.php';

$app = [];

require_once 'config/app.php';

if (isset($app['db']) === true) {
    $db = new \Pecee\Pixie\Connection($app['db']['driver'], $app['db']);

    if (app()->getDebugEnabled() === true) {

        $db->registerEvent('before-*', static function (\Pecee\Pixie\Event\EventArguments $e) {
            debug('db', 'START QUERY: %s', str_replace('%', '%%', $e->getQuery()->getRawSql()));
        });

        $db->registerEvent('after-*', static function (\Pecee\Pixie\Event\EventArguments $e) {
            debug('db', 'END QUERY: %s', str_replace('%', '%%', $e->getQuery()->getRawSql()));
        });
    }

    app()->setConnection($db);
}

if (count(app()->getModules()) > 0) {

    spl_autoload_register(static function ($class) {
        $file = explode('\\', $class);
        $app = array_shift($file);

        $module = app()->getModule($app);

        if ($module !== null) {
            require_once $module . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . join(DIRECTORY_SEPARATOR, $file) . '.php';
        }
    });
}

use Pecee\Application\Router;

Router::init();

require_once __DIR__ . '/routes/web.php';

if (PHP_SAPI === 'cli') {
    /* Set default paths */
    request()->setUrl(new \Pecee\Http\Url('/'));
    request()->setHost(env('SITE_DOMAIN'));

    /* Load routes so url() can be used in cli-mode */
    Router::router()->loadRoutes();
} else {
    ini_set('session.cookie_samesite', 'None');
    ini_set('session.cookie_secure', true);
    ini_set('session.cookie_httponly', false);
    session_set_cookie_params(['SameSite' => 'None', 'Secure' => true]);
}