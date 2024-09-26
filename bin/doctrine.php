<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Jhonattan\Doctrine\Helper\EntityManagerCreator;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);