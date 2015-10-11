<?php
$abspath = substr(__FILE__,0,strlen(__FILE__) - strlen('config/init.php'));
set_include_path($abspath . PATH_SEPARATOR . $abspath . 'lib' . DIRECTORY_SEPARATOR);
require_once  '../../../vendor/pecee/framework/config/routes.php';
require_once 'config/config.php';