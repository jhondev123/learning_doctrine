<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Jhonattan\Doctrine\Helper\EntityManagerCreator;
use Jhonattan\Doctrine\Entities\Student;

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);
/** @var Student[] $students */
$students = $studentRepository->findAll();
foreach ($students as $student) {
    echo "ID: {$student->id}\nName: {$student->name}\n\n";
    foreach ($student->getPhones() as $phone) {
        echo "Phone: {$phone->number}\n\n";
    }
}

// print_r($studentRepository->findBy(["name" => "Jhonattan"]));
