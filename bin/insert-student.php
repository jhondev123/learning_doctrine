<?php

use Jhonattan\Doctrine\Entities\Phone;
use Jhonattan\Doctrine\Entities\Student;
use Jhonattan\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student('Aluno com fone');

$student->addPhone(new Phone('11999999999'));
$student->addPhone(new Phone('11999999999'));


$entityManager->persist($student);
$entityManager->flush();
