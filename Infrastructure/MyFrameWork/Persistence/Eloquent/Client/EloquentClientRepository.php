<?php declare(strict_types=1);

namespace Infrastructure\Persistence\Eloquent\Client;

use ExampleApp\Domain\Client\Entity\Client;
use ExampleApp\Domain\Client\Entity\ClientRepository;

use Illuminate\Database\Capsule\Manager as Capsule;

use Infrastructure\Persistence\Eloquent\Client\Client as ModelClient;

class EloquentClientRepository implements ClientRepository
{

    private $conn;

    public function __construct()
    {
        $capsule = new Capsule;
        $capsule->addConnection([
          'driver'   => 'sqlite',
          'database' => 'C:/wamp/www/clean-architecture/Data/sqlite.db',
          'prefix'   => '',
        ], 'default');

        $capsule->bootEloquent();
        $capsule->setAsGlobal();

        // Hold a reference to established connection just in case.
        $this->connection = $capsule->getConnection('default');
    }

    public function getClientById(string $id = ''): ?Client
    {
        $client = ModelClient::where('id', $id)->first();

        if ($client === null) {
            return null;
        }

        return new Client(
            $client->id(),
            $client->name()
        );
    }

    public function addClient(Client $client)
    {
        $this->clients[] = $client;
    }

}
