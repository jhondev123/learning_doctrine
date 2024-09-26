<?php

namespace Jhonattan\Doctrine\Entities;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity]
class Student
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    public int $id;
    #[OneToMany(mappedBy: 'student', targetEntity: Phone::class, cascade: ['persist', 'remove'])]
    private Collection $phones;

    #[ManyToMany(targetEntity: Course::class, inversedBy: 'students')]
    private Collection $courses;
    public function __construct(
        #[Column]
        public string $name
    ) {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    public function getPhones(): Collection
    {
        return $this->phones;
    }
    public function getCourses(): Collection
    {
        return $this->courses;
    }
    public function enRollInCourse(Course $course)
    {
        if ($this->courses->contains($course)) {
            return;
        }
        $this->courses->add($course);
        $course->addStudent($this);
    }
}
