<?php
$abspath = __DIR__ . DIRECTORY_SEPARATOR;
set_include_path($abspath . PATH_SEPARATOR . $abspath . 'app' . DIRECTORY_SEPARATOR);

require_once  'vendor/pecee/framework/boot.php';

function modules_autoloader($class) {
	$file = explode('\\', $class);
	$app = array_shift($file);
	$file = join(DIRECTORY_SEPARATOR, $file) . '.php';

	if(count(app()->getModules()) > 0) {
		$module = app()->getModule($app);

		if ($module !== null) {
			require_once $module . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $file;
		}
	}
}

spl_autoload_register('modules_autoloader');

$app = array();

require_once 'config/app.php';

if(isset($app['db'])) {
	new \Pixie\Connection($app['db']['driver'], $app['db'], 'QB');
}