<?php declare(strict_types=1);

namespace Infrastructure\Controller;

use ExampleApp\Domain\Client\UseCase\GetClient\GetClient;
use ExampleApp\Domain\Client\UseCase\GetClient\GetClientRequest;

use ExampleApp\Presentation\Client\GetClientHtmlPresenter;

use Infrastructure\View\GetClientView;

class ClientController
{

    public function __construct(
        GetClient $GetClient,
        GetClientHtmlPresenter $GetClientHtmlPresenter,
        GetClientView $GetClientView
    ) {
        $this->GetClient = $GetClient;
        $this->GetClientHtmlPresenter = $GetClientHtmlPresenter;
        $this->GetClientView = $GetClientView;
    }

    public function __invoke(
        string $clientId
    ) {

        $this->GetClient->execute(new GetClientRequest($clientId), $this->GetClientHtmlPresenter);

        return $this->GetClientView->generateViewBeforePost($this->GetClientHtmlPresenter->viewModel());
    }

}
