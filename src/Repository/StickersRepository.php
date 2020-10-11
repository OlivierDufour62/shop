<?php

namespace App\Repository;

use App\Entity\Stickers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Stickers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stickers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stickers[]    findAll()
 * @method Stickers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StickersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stickers::class);
    }

    // /**
    //  * @return Stickers[] Returns an array of Stickers objects
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
    public function findOneBySomeField($value): ?Stickers
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
