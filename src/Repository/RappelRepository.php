<?php

namespace App\Repository;

use App\Entity\Rappel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Rappel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rappel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rappel[]    findAll()
 * @method Rappel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RappelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Rappel::class);
    }

    // /**
    //  * @return Rappel[] Returns an array of Rappel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rappel
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
