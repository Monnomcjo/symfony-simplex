<?php declare(strict_types=1);

namespace Demo;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use Demo\DemoEntity;
use Demo\DemoRepository;

use Demo\DoctrineDemoEntity as DoctrineDemoEntity;

class DoctrineDemoRepository extends ServiceEntityRepository implements DemoRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DoctrineDemoEntity::class);
    }

    public function getDemoById(string $id = ''): ?Demo
    {

        $demo = $this->findOneBy(['id' => $id]);
        if ($demo === null) {
            return null;
        }

        return new Demo(
            $demo->id(),
            $demo->name()
        );
    }

    public function addDemo(Demo $client)
    {
        $this->demo[] = $demo;
    }
}