<?php

namespace Jhonattan\Doctrine\Entities;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Phone
{
    #[Column]
    #[Id]
    #[GeneratedValue]
    public int $id;
    #[ManyToOne(targetEntity: Student::class, inversedBy: 'phones')]
    public Student $student;
    public function __construct(
        #[Column]
        public readonly string $number
    ) {}
    public function setStudent(Student $student)
    {
        $this->student = $student;
    }
}
