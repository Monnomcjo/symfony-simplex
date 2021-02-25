<?php declare(strict_types=1);

namespace ExampleAppTest\Domain\Client\UseCase\GetClient;

use ExampleApp\Domain\Client\Entity\Client;
use ExampleApp\Domain\Client\Entity\ClientRepository;

class InMemoryClientRepository implements ClientRepository
{
    /**
     * @var Client[]
     */
    private $clients = [];

    public function getClientById(string $id = ''): ?Client
    {
        $find = function (Client $client) use ($id) {
            return $client->id() === $id;
        };

        $clientsFound = array_values(array_filter($this->clients, $find));
        if (count($clientsFound) === 1) {
            return $clientsFound[0];
        }

        return null;
    }

    public function addClient(Client $client)
    {
        $this->clients[] = $client;
    }
}
