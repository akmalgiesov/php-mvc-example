<?php

namespace App;

require_once __DIR__ . '/vendor/autoload.php';

use App\Routes\routes;

header('Content-Type: text/html; charset=utf-8');

$route = new routes();
$route->goTo();


?>
