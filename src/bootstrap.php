<?php

use Illuminate\Database\Capsule\Manager as Capsule;
//Globals
defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('VIEW_BASE_FOLDER') ||define ('VIEW_BASE_FOLDER', __DIR__. DS. 'views');
defined('TEMPLATE_BASE_FOLDER') ||define ('TEMPLATE_BASE_FOLDER', __DIR__. DS. 'templates');

require_once 'functions.php';
//database
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => '_YOUR_DRIVER',
    'host'      => '_YOUR_HOST',
    'database'  => '_YOUR_DATABASE',
    'username'  => '_YOUR USERNAME',
    'password'  => '_YOUR PASSWORD',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);



$capsule->setAsGlobal();
$capsule->bootEloquent();