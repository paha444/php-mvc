<?php if (!defined('SITE')) exit('No direct script access allowed.');

// конфиг
require_once 'config.php';
///

// язык
require_once 'application/languages/ru.php';
///


//
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
///

///
require_once 'classes/Functions.php';
require_once 'classes/User.php';

///


require_once 'core/route.php';

//Route::start(); // запускаем маршрутизатор

$Route = new Route();
$Route->start();






?>