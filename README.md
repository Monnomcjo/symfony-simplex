# Introduction
It is a two-part exercise. On the one hand, create your own Framework (https://symfony.com/doc/current/create_framework/index.html) and on the other hand experiment with Clean Architecture and Domain Driven Design.

# Install and Run
composer update

cd Framework/MyFrameWork

composer update

setup DB connection in Infrastructure\MyFrameWork\Persistence\Doctrine\Client\DoctrineClientRepository.php

setup DB connection in Infrastructure\MyFrameWork\Persistence\Eloquent\Client\EloquentClientRepository.php

setup Twig template in Infrastructure\MyFrameWork\View\GetClientView.php

php -S 127.0.0.1:8000 -t web

http://127.0.0.1:8000/client/1

# Using Eloquent
Comment/Uncomment Framework\MyFramework\src\container.php lines 32/39
