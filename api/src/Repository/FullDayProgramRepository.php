<?php

namespace App\Repository;

use App\Entity\FullDayProgram;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FullDayProgram|null find($id, $lockMode = null, $lockVersion = null)
 * @method FullDayProgram|null findOneBy(array $criteria, array $orderBy = null)
 * @method FullDayProgram[]    findAll()
 * @method FullDayProgram[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FullDayProgramRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FullDayProgram::class);
    }

    // /**
    //  * @return FullDayProgram[] Returns an array of FullDayProgram objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FullDayProgram
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
