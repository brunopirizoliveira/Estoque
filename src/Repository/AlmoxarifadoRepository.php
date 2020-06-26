<?php

namespace App\Repository;

use App\Entity\Almoxarifado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Almoxarifado|null find($id, $lockMode = null, $lockVersion = null)
 * @method Almoxarifado|null findOneBy(array $criteria, array $orderBy = null)
 * @method Almoxarifado[]    findAll()
 * @method Almoxarifado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlmoxarifadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Almoxarifado::class);
    }

    // /**
    //  * @return Almoxarifado[] Returns an array of Almoxarifado objects
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
    public function findOneBySomeField($value): ?Almoxarifado
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
