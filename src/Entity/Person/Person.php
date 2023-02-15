<?php

namespace App\Entity\Person;

use App\Entity\Apartments\Apartment;
use App\Repository\Person\PersonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use function Symfony\Component\Translation\t;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?int $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\OneToOne(mappedBy: 'person', cascade: ['persist', 'remove'])]
    private ?Apartment $apartments = null;

    public function __toString(): string
    {
        return $this->getFirstName() . ' ' .  $this->getLastName();
    }

    public function getId(): int
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

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

    public function getApartments(): ?Apartment
    {
        return $this->apartments;
    }

    public function setApartments(?Apartment $apartments): self
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
