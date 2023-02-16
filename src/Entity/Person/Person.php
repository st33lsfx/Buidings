<?php

namespace App\Entity\Person;

use App\Entity\Apartments\Apartment;
use App\Model\Person\PersonModel;
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

    #[ORM\Column(length: 255,)]
    private string $firstName;

    #[ORM\Column(length: 255)]
    private string $lastName;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column]
    private int $phone;

    #[ORM\OneToOne(mappedBy: 'person', cascade: ['persist', 'remove'])]
    private ?Apartment $apartment = null;

    public function __toString(): string
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): void
    {
        $this->phone = $phone;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }
    public function getApartment(): ?Apartment
    {
        return $this->apartment;
    }

    public function setApartment(?Apartment $apartment): self
    {
        // unset the owning side of the relation if necessary
        if ($apartment === null && $this->apartment !== null) {
            $this->apartment->setPerson(null);
        }

        // set the owning side of the relation if necessary
        if ($apartment !== null && $apartment->getPerson() !== $this) {
            $apartment->setPerson($this);
        }

        $this->apartment = $apartment;

        return $this;
    }

    public function mapForModel(PersonModel $personModel): void
    {
        $this->setFirstName($personModel->firstName);
        $this->setLastName($personModel->lastName);
        $this->setEmail($personModel->email);
        $this->setPhone($personModel->phone);
        $this->setApartment($personModel->apartment);
    }

}
