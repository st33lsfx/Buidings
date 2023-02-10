<?php

namespace App\Entity\Person;

use App\Entity\Apartments\Apartments;
use App\Repository\Person\PersonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column]
    private ?int $phone = null;

    #[ORM\OneToOne(mappedBy: 'person', cascade: ['persist', 'remove'])]
    private ?Apartments $apartments = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getApartments(): ?Apartments
    {
        return $this->apartments;
    }

    public function setApartments(?Apartments $apartments): self
    {
        // unset the owning side of the relation if necessary
        if ($apartments === null && $this->apartments !== null) {
            $this->apartments->setPerson(null);
        }

        // set the owning side of the relation if necessary
        if ($apartments !== null && $apartments->getPerson() !== $this) {
            $apartments->setPerson($this);
        }

        $this->apartments = $apartments;

        return $this;
    }
}
