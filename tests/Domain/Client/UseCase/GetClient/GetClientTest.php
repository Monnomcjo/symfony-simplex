<?php declare(strict_types=1);

namespace ExampleAppTest\Domain\Client\UseCase\GetClient;

use PHPUnit\Framework\TestCase;

use ExampleApp\Domain\Client\UseCase\GetClient\GetClient;
use ExampleApp\Domain\Client\UseCase\GetClient\GetClientPresenter;
use ExampleApp\Domain\Client\UseCase\GetClient\GetClientRequest;
use ExampleApp\Domain\Client\UseCase\GetClient\GetClientResponse;
use ExampleApp\Domain\Client\Entity\ClientRepository;

use ExampleAppTest\Domain\Client\UseCase\GetClient\InMemoryClientRepository;
use ExampleAppTest\Domain\Client\Entity\ClientBuilder;

class GetClientTest extends TestCase implements GetClientPresenter
{
    const CLIENT_ID = 'client-id';
    /** @var GetClientResponse */
    private $response;
    private $clientRepository;
    private $getClient;
    private $client;

    protected function setUp(): void
    {
        $this->clientRepository = new InMemoryClientRepository();
        $this->client = ClientBuilder::aClient()->withId(self::CLIENT_ID)->build();
        $this->clientRepository->addClient($this->client);
        $this->getClient = new GetClient($this->clientRepository);
    }

    public function present(GetClientResponse $response): void
    {
        $this->response = $response;
    }

    public function test_it_returns_a_client()
    {
        $this->getClient->execute(new GetClientRequest(self::CLIENT_ID), $this);

        $this->assertNotNull($this->response->client());
        $this->assertSame($this->client->name(), $this->response->client()->name());
    }

    public function test_it_returns_no_client_when_he_does_not_exist()
    {
        $this->getClient->execute(new GetClientRequest('unknown-client'), $this);

        $this->assertNull($this->response->client());
    }
}
