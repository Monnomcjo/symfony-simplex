<?php declare(strict_types=1);

namespace Demo;

use Demo\DemoRepository;

class DemoServiceWithRepository
{
  private $demoRepository;

  public function __construct(DemoRepository $demoRepository)
  {
      $this->demoRepository = $demoRepository;
  }

  public function helloWorld()
  {
    return "Hello World!\n";
  }
}
