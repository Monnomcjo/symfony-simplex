<?php declare(strict_types=1);

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

// nok with dependency
$routes->add('hello', new Routing\Route('/hello', [
    '_controller' => 'Demo\DemoController::helloWorld',
]));

// ok with no dependency
$routes->add('hello2', new Routing\Route('/hello2', [
    '_controller' => 'Demo\DemoService::helloWorld',
]));

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController',
]));

return $routes;
