<?php declare(strict_types=1);

namespace Demo;

class DemoController
{
  private $demo_service;

  public function __construct(\Demo\DemoService $demoService)
  {
    $this->demo_service = $demoService;
  }

  public function helloWorld()
  {
    return $this->demo_service->helloWorld();
  }
}
