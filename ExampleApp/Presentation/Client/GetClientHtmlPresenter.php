<?php declare(strict_types=1);

namespace ExampleApp\Presentation\Client;

use ExampleApp\Domain\Client\UseCase\GetClient\GetClientResponse;
use ExampleApp\Domain\Client\UseCase\GetClient\GetClientPresenter;

class GetClientHtmlPresenter implements GetClientPresenter
{
    private $viewModel;

    public function present(GetClientResponse $response): void
    {
        $this->viewModel = new GetClientHtmlViewModel();
        $this->viewModel->makeReadableClient(
            $response->client()->id(),
            $response->client()->name()
        );
    }

    public function viewModel()
    {
        return $this->viewModel;
    }
}
