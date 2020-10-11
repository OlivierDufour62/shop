<?php

namespace App\Repository;

use App\Entity\StickersCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StickersCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method StickersCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method StickersCategories[]    findAll()
 * @method StickersCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StickersCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StickersCategories::class);
    }

    // /**
    //  * @return StickersCategories[] Returns an array of StickersCategories objects
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
    public function findOneBySomeField($value): ?StickersCategories
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
