<?php declare(strict_types=1);

namespace ExampleApp\Domain\Client\UseCase\GetClient;

interface GetClientPresenter
{
    public function present(GetClientResponse $response): void;
}
