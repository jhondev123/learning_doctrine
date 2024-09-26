<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Jhonattan\Doctrine\Helper\EntityManagerCreator;
use Jhonattan\Doctrine\Entities\Student;

$entityManager = EntityManagerCreator::createEntityManager();
$student = $entityManager->find(Student::class, $argv[1]);
$entityManager->remove($student);
$entityManager->flush();
