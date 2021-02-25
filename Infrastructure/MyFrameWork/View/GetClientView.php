<?php declare(strict_types=1);

namespace Infrastructure\View;

use ExampleApp\Presentation\Client\ReadableClient;
use ExampleApp\Presentation\Client\GetClientHtmlViewModel;

use Symfony\Component\HttpFoundation\Response;

class GetClientView
{
    private $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('C:\wamp\www\clean-architecture\Infrastructure\MyFrameWork\Template');
        $twig = new \Twig\Environment($loader);
        $this->twig = $twig;
    }

    public function generateViewBeforePost(GetClientHtmlViewModel $viewModel)
    {
        return $this->generateView($viewModel->readableClient());
    }

    private function generateView(ReadableClient $readableClient, $errors = []): Response
    {
        return new Response(
            $this->twig->render(
                'client.html.twig',
                [
                    'client' => $readableClient,
                    'errors' => $errors,
                ]
            )
        );
    }
}
