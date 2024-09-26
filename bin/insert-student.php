<?php

use Jhonattan\Doctrine\Entities\Phone;
use Jhonattan\Doctrine\Entities\Student;
use Jhonattan\Doctrine\Helper\EntityManagerCreator;
require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student('Aluno com fone');

$phone = new Phone('11999999999');
$phone2 = new Phone('11999999999');

$entityManager->persist($phone);
$entityManager->persist($phone2);

$student->addPhone($phone);
$student->addPhone($phone2);


$entityManager->persist($student);
$entityManager->flush();