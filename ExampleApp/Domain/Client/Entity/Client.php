<?php declare(strict_types=1);

namespace ExampleApp\Domain\Client\Entity;

class Client
{
    private $id;
    private $name;
    private $email;

    public function __construct(
        string $id = '',
        string $name = '',
        string $email = ''
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
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

    public function email(): string
    {
        return $this->email;
    }
}
