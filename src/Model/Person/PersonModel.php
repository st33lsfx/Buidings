<?php

namespace App\Model\Person;

use App\Entity\Person\Person;
use Symfony\Component\Validator\Constraints as Assert;

class PersonModel
{
    public int $id;

    #[Assert\NotBlank()]
    public string $firstName;

    #[Assert\NotBlank()]
    public string $lastName;

    public ?string $phone = null;

    #[Assert\NotBlank()]
    #[Assert\Email()]
    public string $email;


    public static function createFromEntity(Person $person): PersonModel
    {
        $newPerson = new self();

        $newPerson->id = $person->getId();
        $newPerson->firstName = $person->getFirstName();
        $newPerson->lastName = $person->getLastName();
        $newPerson->phone = $person->getPhone();
        $newPerson->email = $person->getEmail();

        return $newPerson;
    }

}