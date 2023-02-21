<?php

namespace App\Model\Apartment;

use App\Entity\Apartments\Apartment;
use App\Entity\Building\Building;
use App\Entity\Person\Person;
use Symfony\Component\Validator\Constraints as Assert;

class ApartmentModel
{

    #[Assert\NotBlank]
    public string $title;

    public ?int $size = null;

    public ?float $coldWaterStatus = null;

    public ?float $hotWaterStatus = null;
    public ?float $gasMeterStatus = null;

    public ?float $squareStatus = null;

    #[Assert\NotBlank]
    public Building $building;

    public ?Person $person = null;

    public static function createFromEntity(Apartment $apartments): ApartmentModel
    {
        $newApartments = new self();

        $newApartments->title = $apartments->getTitle();
        $newApartments->size = $apartments->getSize();
        $newApartments->coldWaterStatus = $apartments->getColdWaterStatus();
        $newApartments->hotWaterStatus = $apartments->getHotWaterStatus();
        $newApartments->gasMeterStatus = $apartments->getGasMeterStatus();
        $newApartments->squareStatus = $apartments->getSquareStatus();
        $newApartments->building = $apartments->getBuilding();
        $newApartments->person = $apartments->getPerson();

        return $newApartments;
    }


}