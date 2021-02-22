<?php declare(strict_types=1);

namespace Framework;

use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Psr\Log\LoggerInterface;

class ControllerResolver extends ControllerResolver
{
    protected $container;
    private $logger;

    public function __construct(ContainerInterface $container, LoggerInterface $logger = null)
    {
        $this->container = $container;

        parent::__construct($logger);
    }

    protected function createController($controller)
    {
        if (false === strpos($controller, '::')) {
           throw new \InvalidArgumentException(sprintf('Unable to find controller "%s".', $controller));
        }

        list($class, $method) = explode('::', $controller, 2);

        $class = "Infrastructure\\Controller\\" . $class;
var_dump('sssssssssssssssss');
        if (!class_exists($class)) {
            if (!$this->container->has($class)) {
                throw new \Exception();
            }
            $controller = $this->container->get($class);

            return array($controller, $method);
        }

        $controller = new $class();
        if ($controller instanceof ContainerAwareInterface) {
            $controller->setContainer($this->container);
        }

        return array($controller, $method);
    }
}
