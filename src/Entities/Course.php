<?php

namespace Jhonattan\Doctrine\Entities;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany;

#[Entity()]
class Course
{
    #[Id, GeneratedValue, Column(type: 'integer')]
    public int $id;
    #[ManyToMany(targetEntity: Student::class, mappedBy: 'courses')]
    private Collection $students;

    public function __construct(
        #[Column(type: 'string')]
        private readonly string $name
    ) {
        $this->students = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getStudents(): Collection
    {
        return $this->students;
    }
    public function addStudent(Student $student)
    {
        if ($this->students->contains($student)) {
            return;
        }

        $this->students->add($student);
        $student->enRollInCourse($this);
    }
}
