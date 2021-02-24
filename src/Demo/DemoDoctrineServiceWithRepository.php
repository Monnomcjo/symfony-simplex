<?php declare(strict_types=1);

namespace Demo;

use Demo\DoctrineDemoRepository;

class DemoDoctrineServiceWithRepository
{
  private $doctrineDemoRepository;

  public function __construct(DoctrineDemoRepository $doctrineDemoRepository)
  {
      $this->doctrineDemoRepository = $doctrineDemoRepository;
  }

  public function helloWorld()
  {
    return "Hello World!\n";
  }
}
