<?php
$abspath = __DIR__ . DIRECTORY_SEPARATOR;
set_include_path($abspath . PATH_SEPARATOR . $abspath . 'app' . DIRECTORY_SEPARATOR);

require_once  'vendor/pecee/framework/boot.php';

$app = array();

require_once 'config/app.php';

if(isset($app['db'])) {
    new \Pixie\Connection($app['db']['driver'], $app['db'], 'QB');
}

function modules_autoloader($class) {
    $file = explode('\\', $class);
    $app = array_shift($file);
    $file = join(DIRECTORY_SEPARATOR, $file) . '.php';

    if(request()->modules !== null && request()->modules instanceof \Pecee\Module) {
        $module = request()->modules->get($app);

        if ($module !== null) {
            require_once $module . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $file;
        }
    }
}

if(request()->modules !== null && request()->modules instanceof \Pecee\Module && count(request()->modules->getList())) {
    foreach(request()->modules as $module) {
        set_include_path(get_include_path() . PATH_SEPARATOR . $module . '/app/' . PATH_SEPARATOR . $module . '/');
    }
}

spl_autoload_register('modules_autoloader');