<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Jhonattan\Doctrine\Helper\EntityManagerCreator;
use Jhonattan\Doctrine\Entities\Student;

$entityManager = EntityManagerCreator::createEntityManager();
// $repository = $entityManager->getRepository(Student::class);
// $student = $repository->find($argv[1]);
$student = $entityManager->find(Student::class, $argv[1]);
$student->name = $argv[2];
$entityManager->flush();
