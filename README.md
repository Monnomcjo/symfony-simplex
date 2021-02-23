# symfony-simplex
Case Study https://symfony.com/doc/current/create_framework/index.html

# Install and Run
composer update

php -S 127.0.0.1:8000 -t web

# Ok
http://127.0.0.1:8000/hello (ok, Controller width DI)

http://127.0.0.1:8000/hello2 (ok, Without DI)

# Problem
http://127.0.0.1:8000/hello3 (Nok, Load repositories as services)
