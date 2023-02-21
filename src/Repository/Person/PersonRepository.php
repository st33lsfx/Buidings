<?php

namespace App\Repository\Person;

use App\Entity\Person\Person;
use App\Repository\AbstractRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 *
 * @method Person|null find($id, $lockMode = null, $lockVersion = null)
 * @method Person|null findOneBy(array $criteria, array $orderBy = null)
 * @method Person[]    findAll()
 * @method Person[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Person::class);
    }
}
