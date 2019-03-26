<?php

namespace App\Repository;

use App\Entity\BulletinDePaie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BulletinDePaie|null find($id, $lockMode = null, $lockVersion = null)
 * @method BulletinDePaie|null findOneBy(array $criteria, array $orderBy = null)
 * @method BulletinDePaie[]    findAll()
 * @method BulletinDePaie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BulletinDePaieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BulletinDePaie::class);
    }

    // /**
    //  * @return BulletinDePaie[] Returns an array of BulletinDePaie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BulletinDePaie
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
