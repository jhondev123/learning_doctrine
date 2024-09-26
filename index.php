<?php

use Jhonattan\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/vendor/autoload.php';
$entityManager =  EntityManagerCreator::createEntityManager();
var_dump($entityManager);