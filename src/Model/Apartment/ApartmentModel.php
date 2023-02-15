<?php

namespace App\Model\Apartment;

use App\Entity\Apartments\Apartment;

class ApartmentModel
{

    public int $id;

    public ?string $title;

    public ?int $size;

    public ?float $coldWaterStatus;

    public ?float $hotWaterStatus;
    public ?float $gasMeterStatus;

    public ?float $squareStatus;

    public ?string $building;

    public ?string $person;

    public function createFromEntity(Apartment $apartments): ApartmentModel
    {
        $newApartments = new self();

        $newApartments->id = $apartments->getId();
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

    public function createFromEmpty(): ApartmentModel
    {
        return new self();
    }


}