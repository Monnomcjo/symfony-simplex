<?php declare(strict_types=1);

namespace ExampleApp\Domain\Client\UseCase\GetClient;

use ExampleApp\Domain\Client\Entity\Client;

class GetClientResponse
{
    private $client;

    public function client(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }
}
