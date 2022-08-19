<?php
declare(strict_types=1);
define('PROJECT_ROOT', __DIR__);

ini_set("DISPLAY_ERRORS", '1');
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

(new Core\Application(new \Core\ServiceContainer(include '../config/app.php')))->run();

