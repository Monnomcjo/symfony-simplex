<?php declare(strict_types=1);

use Framework\Framework;

use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\EventDispatcher;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;

$containerBuilder = new DependencyInjection\ContainerBuilder();
$containerBuilder->register('context', Routing\RequestContext::class);
$containerBuilder->register('matcher', Routing\Matcher\UrlMatcher::class)
    ->setArguments([$routes, new Reference('context')])
;
$containerBuilder->register('request_stack', HttpFoundation\RequestStack::class);
$containerBuilder->register('argument_resolver', HttpKernel\Controller\ArgumentResolver::class);

$containerBuilder->register('listener.router', HttpKernel\EventListener\RouterListener::class)
    ->setArguments([new Reference('matcher'), new Reference('request_stack')])
;
$containerBuilder->register('listener.response', HttpKernel\EventListener\ResponseListener::class)
    ->setArguments(['UTF-8'])
;
$containerBuilder->register('listener.exception', HttpKernel\EventListener\ErrorListener::class)
    ->setArguments(['Calendar\Controller\ErrorController::exception'])
;
$containerBuilder->register('container_controller_resolver', HttpKernel\Controller\ContainerControllerResolver::class)
    ->setArguments([new Reference('service_container')]);

// Doctrine
$containerBuilder->register(\ExampleApp\Domain\Client\Entity\ClientRepository::class, \Infrastructure\Persistence\Doctrine\Client\DoctrineClientRepository::class)
    ->setArguments([new Reference('service_container')]);
/*
// Eloquent
$containerBuilder->register(\ExampleApp\Domain\Client\Entity\ClientRepository::class, \Infrastructure\Persistence\Eloquent\Client\EloquentClientRepository::class)
    ->setArguments([new Reference('service_container')]);
*/

$containerBuilder->register(\ExampleApp\Domain\Client\UseCase\GetClient\GetClient::class, \ExampleApp\Domain\Client\UseCase\GetClient\GetClient::class)
    ->setArguments([new Reference(\ExampleApp\Domain\Client\Entity\ClientRepository::class)]);

$containerBuilder->register(\ExampleApp\Presentation\Client\GetClientHtmlPresenter::class, \ExampleApp\Presentation\Client\GetClientHtmlPresenter::class);

$containerBuilder->register(\Infrastructure\View\GetClientView::class, \Infrastructure\View\GetClientView::class);

$containerBuilder->register(\Infrastructure\Controller\ClientController::class, \Infrastructure\Controller\ClientController::class)
    ->setArguments([
        new Reference(\ExampleApp\Domain\Client\UseCase\GetClient\GetClient::class),
        new Reference(\ExampleApp\Presentation\Client\GetClientHtmlPresenter::class),
        new Reference(\Infrastructure\View\GetClientView::class)
]);


$containerBuilder->register('dispatcher', EventDispatcher\EventDispatcher::class)
    ->addMethodCall('addSubscriber', [new Reference('listener.router')])
    ->addMethodCall('addSubscriber', [new Reference('listener.response')])
    ->addMethodCall('addSubscriber', [new Reference('listener.exception')])
;
$containerBuilder->register('framework', Framework::class)
    ->setArguments([
        new Reference('dispatcher'),
        new Reference('container_controller_resolver'),
        new Reference('request_stack'),
        new Reference('argument_resolver'),
    ])
;

return $containerBuilder;
