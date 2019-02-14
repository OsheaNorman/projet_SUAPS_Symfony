<?php

namespace App\Repository;

use App\Entity\AuaExterieurSport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AuaExterieurSport|null find($id, $lockMode = null, $lockVersion = null)
 * @method AuaExterieurSport|null findOneBy(array $criteria, array $orderBy = null)
 * @method AuaExterieurSport[]    findAll()
 * @method AuaExterieurSport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuaExterieurSportRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AuaExterieurSport::class);
    }

//    /**
//     * @return AuaExterieurSport[] Returns an array of AuaExterieurSport objects
//     */
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
    public function findOneBySomeField($value): ?AuaExterieurSport
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
