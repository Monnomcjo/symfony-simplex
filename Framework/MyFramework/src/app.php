<?php declare(strict_types=1);

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('Doctrineclient', new Routing\Route('/client/{clientId}', [
    'clientId' => 'null',
    '_controller' => 'Infrastructure\Controller\ClientController',
]));

return $routes;
