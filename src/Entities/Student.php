<?php

namespace Jhonattan\Doctrine\Entities;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;
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
    #[OneToMany(mappedBy: 'student', targetEntity: Phone::class)]
    private Collection $phones;
    
    public function __construct(
        #[Column]
        public string $name
    ) {
        $this->phones = new ArrayCollection();
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
}
