<?php

namespace App\Repository;

use App\Entity\ArmeSpeciale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ArmeSpeciale>
 *
 * @method ArmeSpeciale|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArmeSpeciale|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArmeSpeciale[]    findAll()
 * @method ArmeSpeciale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmeSpecialeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArmeSpeciale::class);
    }

    public function add(ArmeSpeciale $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ArmeSpeciale $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ArmeSpeciale[] Returns an array of ArmeSpeciale objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ArmeSpeciale
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
