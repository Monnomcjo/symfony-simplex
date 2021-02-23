<?php declare(strict_types=1);

namespace Demo;

interface DemoRepository
{
    public function addDemo(Demo $demo);
    public function getDemoById(string $id = ''): ?Demo;
}
