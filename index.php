<?php

require __DIR__ . '/vendor/autoload.php';

use Yaf\Application;
use Yaf\Registry;

define("APPLICATION_PATH", dirname(__FILE__));

$app = new Application(APPLICATION_PATH . "/conf/application.ini");

$app->bootstrap()->run();

$data = [
    'template' => null,
    'phone' => "12312",
];

var_dump(Registry::get('config')->get('hello'));
