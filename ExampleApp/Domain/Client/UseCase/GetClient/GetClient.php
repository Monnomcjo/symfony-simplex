<?php declare(strict_types=1);

namespace ExampleApp\Domain\Client\UseCase\GetClient;

use ExampleApp\Domain\Client\Entity\ClientRepository;

class GetClient
{
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function execute(GetClientRequest $request, GetClientPresenter $presenter)
    {
        $client = $this->clientRepository->getClientById($request->clientId);

        $response = new GetClientResponse();
        if ($client !== null) {
            $response->setClient($client);
        }

        $presenter->present($response);
    }
}
