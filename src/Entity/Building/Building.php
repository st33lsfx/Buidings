<?php

namespace App\Entity\Building;

use App\Entity\Apartments\Apartments;
use App\Repository\Building\BuildingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BuildingRepository::class)]
class Building
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column]
    private ?int $descriptionNumber = null;

    #[ORM\OneToMany(mappedBy: 'building', targetEntity: Apartments::class)]
    private Collection $units;

    public function __construct()
    {
        $this->units = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDescriptionNumber(): ?int
    {
        return $this->descriptionNumber;
    }

    public function setDescriptionNumber(int $descriptionNumber): self
    {
        $this->descriptionNumber = $descriptionNumber;

        return $this;
    }

    /**
     * @return Collection<int, Apartments>
     */
    public function getUnits(): Collection
    {
        return $this->units;
    }

    public function addUnit(Apartments $unit): self
    {
        if (!$this->units->contains($unit)) {
            $this->units->add($unit);
            $unit->setBuilding($this);
        }

        return $this;
    }

    public function removeUnit(Apartments $unit): self
    {
        if ($this->units->removeElement($unit)) {
            // set the owning side to null (unless already changed)
            if ($unit->getBuilding() === $this) {
                $unit->setBuilding(null);
            }
        }

        return $this;
    }
}
