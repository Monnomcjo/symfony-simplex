<?php declare(strict_types=1);

namespace Infrastructure\Persistence\Doctrine\Client;

use ExampleApp\Domain\Client\Entity\Client;
use ExampleApp\Domain\Client\Entity\ClientRepository;

use Doctrine\DBAL\DriverManager;

class DoctrineClientRepository implements ClientRepository
{

    private $conn;

    public function __construct()
    {
        $connectionParams = array(
            'url' => 'sqlite:///C:\wamp\www\clean-architecture\Data\sqlite.db',
        );
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
        $this->conn = $conn;
    }

    public function getClientById(string $id = ''): ?Client
    {
        $client = new Client();

        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
          ->select('id', 'name')
          ->from('client')
          ->where('id = ?')
          ->setParameter(0, $id)
          ->setFirstResult(0)
        ;
        $row = $queryBuilder->execute()->fetchAll();
        if ($row) {
          $client->setId($row[0]['id']);
          $client->setName($row[0]['name']);
        }

        /*
        // It works too
        $sql = "SELECT * FROM client WHERE id = ".$id."";
        $stmt = $this->conn->query($sql);
        while (($row = $stmt->fetchAssociative()) !== false) {
            $client->setId($row['id']);
            $client->setName($row['name']);
        }
        */

        return $client;
    }

    public function addClient(Client $client)
    {
        $this->clients[] = $client;
    }

}
