<?php declare(strict_types=1);

namespace Demo;

interface DemoRepository
{
    public function addClient(Client $client);
    public function getClientById(string $id = ''): ?Client;
}
