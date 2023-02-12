<?php

namespace App\Model\Building;

use App\Entity\Building\Building;
use App\Services\Building\BuildingCreate;

class BuildingModel
{

    public ?int $id = null;

    public ?string $title = null;

    public ?string $city = null;

    public ?string $address = null;

    public ?int $descriptionNumber = null;

    public ?int $postZip = null;

    public function createFromEntity(Building $building): BuildingModel
    {
        $build = new self();

        $build->id = $building->getId();

        $build->title = $building->getTitle();

        $build->city = $building->getCity();

        $build->address = $building->getAddress();

        $build->descriptionNumber = $building->getDescriptionNumber();

        $build->postZip = $building->getPostZip();

        return $build;
    }

    public function createFromEmpty(): BuildingModel
    {
        return new self();
    }


}