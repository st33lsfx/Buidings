<?php

namespace App\Repository\Apartment;

use App\Entity\Apartments\Apartment;
use App\Repository\AbstractRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 *
 * @method Apartment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apartment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apartment[]    findAll()
 * @method Apartment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApartmentRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Apartment::class);
    }

}
