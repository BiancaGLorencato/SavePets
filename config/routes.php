<?php

declare(strict_types=1);

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


return[
    'Get|/index'=> SavePets\Controller\Index::class
];