<?php

namespace App\Repository;

use App\Entity\LivraisonInclut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LivraisonInclut>
 *
 * @method LivraisonInclut|null find($id, $lockMode = null, $lockVersion = null)
 * @method LivraisonInclut|null findOneBy(array $criteria, array $orderBy = null)
 * @method LivraisonInclut[]    findAll()
 * @method LivraisonInclut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivraisonInclutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LivraisonInclut::class);
    }

//    /**
//     * @return LivraisonInclut[] Returns an array of LivraisonInclut objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LivraisonInclut
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
