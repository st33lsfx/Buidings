<?php

namespace App\Repository\Building;

use App\Entity\Building\Building;
use App\Repository\AbstractRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 *
 * @method Building|null find($id, $lockMode = null, $lockVersion = null)
 * @method Building|null findOneBy(array $criteria, array $orderBy = null)
 * @method Building[]    findAll()
 * @method Building[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BuildingRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Building::class);
    }

}
