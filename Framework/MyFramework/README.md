# Install and Run
composer update

setup DB connection in Infrastructure\MyFrameWork\Persistence\Doctrine\Client\DoctrineClientRepository.php

setup Twig template in Infrastructure\MyFrameWork\View\GetClientView.php

php -S 127.0.0.1:8000 -t web

http://127.0.0.1:8000/client/1
