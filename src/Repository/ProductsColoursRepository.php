<?php

namespace App\Repository;

use App\Entity\ProductsColours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductsColours|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductsColours|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductsColours[]    findAll()
 * @method ProductsColours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductsColoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductsColours::class);
    }

    // /**
    //  * @return ProductsColours[] Returns an array of ProductsColours objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductsColours
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
