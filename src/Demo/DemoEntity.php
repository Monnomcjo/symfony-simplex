<?php declare(strict_types=1);

namespace Demo;

class DemoEntity
{
    private $id;
    private $name;

    public function __construct(
        string $id = '',
        string $name = ''
    ) {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): string
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function name(): string
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
}
