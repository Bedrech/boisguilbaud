<?php

namespace App\Repository;

use App\Entity\Changers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Changers>
 *
 * @method Changers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Changers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Changers[]    findAll()
 * @method Changers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChangersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Changers::class);
    }

    //    /**
    //     * @return Changers[] Returns an array of Changers objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Changers
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
