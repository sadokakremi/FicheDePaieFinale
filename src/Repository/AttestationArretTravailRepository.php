<?php

namespace App\Repository;

use App\Entity\AttestationArretTravail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AttestationArretTravail|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttestationArretTravail|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttestationArretTravail[]    findAll()
 * @method AttestationArretTravail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttestationArretTravailRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AttestationArretTravail::class);
    }

    // /**
    //  * @return AttestationArretTravail[] Returns an array of AttestationArretTravail objects
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
    public function findOneBySomeField($value): ?AttestationArretTravail
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
