<?php declare(strict_types=1);

namespace Demo;

use Symfony\Component\DependencyInjection\Container;

use Demo\DemoRepository;

class DemoServiceWithRepository
{
  private $demoRepository;

  public function __construct(Container $demoRepository)
  {
      $this->demoRepository = $demoRepository;
  }

  public function getDemoById(string $id = ''): ?DemoEntity
  {
      //var_dump($this->demoRepository->get(\Demo\DemoServiceWithRepository::class));
      $demo = new DemoEntity();
      $demo->setId($id);
      return $demo;
  }

}
