<?php

namespace App\Model\Person;

use App\Entity\Apartments\Apartment;
use App\Entity\Person\Person;

class PersonModel
{

    public int $id;

    public string $firstName;

    public string $lastName;

    public int $phone;

    public ?string $email = null;

    public ?Apartment $apartment = null;

    public static function createFromEntity(Person $person): PersonModel
    {
        $newPerson = new self();

        $newPerson->id = $person->getId();
        $newPerson->firstName = $person->getFirstName();
        $newPerson->lastName = $person->getLastName();
        $newPerson->phone = $person->getPhone();
        $newPerson->email = $person->getEmail();
        $newPerson->apartment = $person->getApartment();

        return $newPerson;
    }

}