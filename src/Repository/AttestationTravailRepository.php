<?php

namespace App\Repository;

use App\Entity\AttestationTravail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AttestationTravail|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttestationTravail|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttestationTravail[]    findAll()
 * @method AttestationTravail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttestationTravailRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AttestationTravail::class);
    }

    // /**
    //  * @return AttestationTravail[] Returns an array of AttestationTravail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AttestationTravail
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
