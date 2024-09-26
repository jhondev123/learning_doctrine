<?php

namespace Jhonattan\Doctrine\Helper;

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;

class EntityManagerCreator
{
    public static function createEntityManager() : EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . '/..'],
            isDevMode: true,
        );

        $connection = DriverManager::getConnection([
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite',
        ], $config);

        return new EntityManager($connection, $config);
    }
}
