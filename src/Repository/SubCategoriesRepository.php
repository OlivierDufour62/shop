<?php

namespace App\Repository;

use App\Entity\SubCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SubCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubCategories[]    findAll()
 * @method SubCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubCategories::class);
    }

    // /**
    //  * @return SubCategories[] Returns an array of SubCategoryId objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubCategoryId
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
