<?php declare(strict_types=1);

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('hello', new Routing\Route('/hello', [
    '_controller' => 'Demo\DemoController::helloWorld',
]));

$routes->add('hello2', new Routing\Route('/hello2', [
    '_controller' => 'Demo\DependentService::helloWorld',
]));

$routes->add('hello3', new Routing\Route('/hello3', [
    '_controller' => 'Demo\DemoService::helloWorld',
]));

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController',
]));

return $routes;
