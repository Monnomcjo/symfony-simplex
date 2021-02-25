<?php declare(strict_types=1);

namespace ExampleAppTest\Domain\Client\Entity;

use Ramsey\Uuid\Uuid;

use ExampleApp\Domain\Client\Entity\Client;
use ExampleApp\Domain\Client\Entity\ClientRepository;

class ClientBuilder
{
    private $id = null;
    private $name = 'nameTest';
    private $email = 'emailTest';

    public function withId($id)
    {
      $this->id = $id;

      return $this;
    }

    public function withName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function withEmail($email)
    {
        $this->name = $email;

        return $this;
    }

    public function build()
    {
        $id = $this->id ?? Uuid::uuid4()->toString();

        return new Client(
            $id,
            $this->name,
            $this->email
        );
    }

    public static function aClient()
    {
        return new ClientBuilder();
    }
}
