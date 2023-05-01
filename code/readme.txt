code sniffer check
./vendor/bin/phpcs Tests/Car.php

autofix
./vendor/bin/phpcbf Tests


phpstan

vendor/bin/phpstan analyse src tests
vendor/bin/phpstan analyse -c phpstan.neon

php unit tests
vendor/phpunit/phpunit/phpunit Tests/Car.php
