<?php

namespace App\Entity\Building;

use App\Entity\Apartments\Apartment;
use App\Model\Building\BuildingModel;
use App\Repository\Building\BuildingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BuildingRepository::class)]
class Building
{
    #[Groups('building')]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255, nullable: false)]
    private string $title;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(nullable: true)]
    private ?int $descriptionNumber = null;

    #[ORM\Column(nullable: true)]
    private ?string $postZip = null;

    #[ORM\OneToMany(mappedBy: 'building', targetEntity: Apartment::class)]
    private Collection $apartment;

    public function __construct()
    {
        $this->apartment = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getTitle();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    public function getDescriptionNumber(): ?int
    {
        return $this->descriptionNumber;
    }

    public function setDescriptionNumber(?int $descriptionNumber): void
    {
        $this->descriptionNumber = $descriptionNumber;
    }

    public function getPostZip(): ?string
    {
        return $this->postZip;
    }

    public function setPostZip(?string $postZip): void
    {
        $this->postZip = $postZip;
    }

    /**
     * @return Collection<int, Apartment>
     */
    public function getApartments(): Collection
    {
        return $this->apartment;
    }

    public function addApartment(Apartment $apartment): void
    {
        $this->getApartments()->add($apartment);
    }

    public function removeApartment(Apartment $apartment): void
    {
        $this->getApartments()->remove($apartment);
    }

    public function mapFromModel(BuildingModel $buildingModel): void
    {
        $this->setTitle($buildingModel->title);
        $this->setCity($buildingModel->city);
        $this->setAddress($buildingModel->address);
        $this->setDescriptionNumber($buildingModel->descriptionNumber);
        $this->setPostZip($buildingModel->postZip);
    }
}
