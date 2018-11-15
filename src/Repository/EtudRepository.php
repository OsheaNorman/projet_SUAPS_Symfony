<?php

namespace App\Repository;

use App\Entity\Etud;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Etud|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etud|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etud[]    findAll()
 * @method Etud[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtudRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Etud::class);
    }

//    /**
//     * @return Etud[] Returns an array of Etud objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Etud
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
