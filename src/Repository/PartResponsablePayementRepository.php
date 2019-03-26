<?php

namespace App\Repository;

use App\Entity\PartResponsablePayement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PartResponsablePayement|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartResponsablePayement|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartResponsablePayement[]    findAll()
 * @method PartResponsablePayement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartResponsablePayementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PartResponsablePayement::class);
    }

    // /**
    //  * @return PartResponsablePayement[] Returns an array of PartResponsablePayement objects
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
    public function findOneBySomeField($value): ?PartResponsablePayement
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
