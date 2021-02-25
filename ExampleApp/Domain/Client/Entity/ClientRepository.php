<?php declare(strict_types=1);

namespace ExampleApp\Domain\Client\Entity;

interface ClientRepository
{
    public function addClient(Client $client);
    public function getClientById(string $id = ''): ?Client;
}
