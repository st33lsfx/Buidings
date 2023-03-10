<?php

namespace App\Model\Building;

use App\Entity\Building\Building;
use Symfony\Component\Validator\Constraints as Assert;

class BuildingModel
{

    #[Assert\NotBlank]
    public string $title;

    public ?string $city = null;

    public ?string $address = null;

    public ?int $descriptionNumber = null;

    public ?string $postZip = null;

    public static function createFromEntity(Building $building): BuildingModel
    {
        $build = new self();

        $build->title = $building->getTitle();
        $build->city = $building->getCity();
        $build->address = $building->getAddress();
        $build->descriptionNumber = $building->getDescriptionNumber();
        $build->postZip = $building->getPostZip();

        return $build;
    }


}