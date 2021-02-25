<?php declare(strict_types=1);

namespace ExampleApp\Presentation\Client;

class GetClientHtmlViewModel
{
    private $readableClient;

    public function readableClient(): ReadableClient
    {
        return $this->readableClient;
    }

    public function makeReadableClient(string $id, string $name)
    {
        $this->readableClient = new ReadableClient();
        $this->readableClient->id = $id;
        $this->readableClient->name = $name;
    }
}
