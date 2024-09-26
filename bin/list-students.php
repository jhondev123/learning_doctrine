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


    echo "Phones: ";
    echo implode(
        ', ',
        ($student->getPhones()->map(function ($phone) {
            return $phone->number;
        })
        )->toArray()
    );

    echo "\n\nCourses: ";
    echo implode(
        ', ',
        ($student->getCourses()->map(function ($course) {
            return $course->getName();
        })
        )->toArray()
    );
}

// print_r($studentRepository->findBy(["name" => "Jhonattan"]));
