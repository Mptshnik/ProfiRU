<?php

use App\Kernel\App;

define('APP_PATH', dirname(__DIR__));
define('ENV', parse_ini_file(APP_PATH.'/.env'));

require_once APP_PATH.'/vendor/autoload.php';

$app = new App();

$app->run();
