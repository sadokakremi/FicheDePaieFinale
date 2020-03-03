<?php

namespace App\Repository;

use App\Entity\Log2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Log2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Log2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Log2[]    findAll()
 * @method Log2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Log2Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Log2::class);
    }

    // /**
    //  * @return Log2[] Returns an array of Log2 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Log2
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
