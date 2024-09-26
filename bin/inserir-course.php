<?php

use Jhonattan\Doctrine\Entities\Course;
use Jhonattan\Doctrine\Entities\Phone;
use Jhonattan\Doctrine\Entities\Student;
use Jhonattan\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$course = new Course('Doctrine Course');

$student = new Student('Aluno com fone');
$student->addPhone(new Phone('11999999999'));

$course->addStudent($student);

$entityManager->persist($course);
$entityManager->persist($student);
$entityManager->flush();
