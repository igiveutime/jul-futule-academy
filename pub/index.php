<?php

use Laminas\Di\Di;
use App\Di\DiC;
use App\Di\DiFactory;
use App\Router\RouterResolver;

const ROOT_DIR = __DIR__ . '/..';

require "../vendor/autoload.php";

function errorHandler($errno)
{
    $di = new Di();

    $dic = $di->get(DiC::class);
    $dic->assemble();

    if (!(error_reporting() & $errno)) {
        return false;
    }

    return true;
}

set_error_handler('errorHandler');

$di = new Di();

$dic = $di->get(DiC::class);
$dic->assemble();
$diFactory = $di->get(DiFactory::class);

$router = $diFactory->getInstance(RouterResolver::class);
$router->setRoutes($_SERVER['REQUEST_URI']);
$router->execute();
