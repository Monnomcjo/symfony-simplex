<?php declare(strict_types=1);

namespace Demo;

interface DemoRepository
{
    public function addDemo(DemoEntity $demo);
    public function getDemoById(string $id = ''): ?DemoEntity;
}
