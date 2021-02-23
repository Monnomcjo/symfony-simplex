<?php declare(strict_types=1);

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

// ok with dependency
$routes->add('hello', new Routing\Route('/hello', [
    '_controller' => 'Demo\DemoController::helloWorld',
]));

// ok with no dependency
$routes->add('hello2', new Routing\Route('/hello2', [
    '_controller' => 'Demo\DemoService::helloWorld',
]));

// nok with repository dependency
$routes->add('hello3', new Routing\Route('/hello3', [
    '_controller' => 'Demo\DemoServiceWithRepository::helloWorld',
]));

return $routes;
