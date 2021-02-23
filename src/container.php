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

// add demo service into the service container
$containerBuilder->register(\Demo\DemoService::class, \Demo\DemoService::class);

// add dependent service into the controller container
$containerBuilder->register(\Demo\DemoController::class,\Demo\DemoController::class)
    ->setArguments([new Reference(\Demo\DemoService::class)]);

/* New Demo repository tests*/
$containerBuilder->register(\Demo\DemoEntity::class, \Demo\DemoEntity::class);

$containerBuilder->register('my_service_entity_repository', Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository::class)
    ->setArguments([new Reference('doctrine.orm.entity_manager')]);

$containerBuilder->register(\Demo\DemoRepository::class, \Demo\DoctrineDemoRepository::class)
    ->setArguments([new Reference(\Demo\DemoEntity::class)]);

$containerBuilder->register(\Demo\DemoServiceWithRepository::class,\Demo\DemoServiceWithRepository::class)
    ->setArguments([new Reference(\Demo\DemoRepository::class)]);


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
        //new Reference('doctrine.orm.entity_manager'),
    ])
;

return $containerBuilder;
