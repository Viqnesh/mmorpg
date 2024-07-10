<?php

namespace App\Repository;

use App\Entity\CoupSpeciale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoupSpeciale>
 *
 * @method CoupSpeciale|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoupSpeciale|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoupSpeciale[]    findAll()
 * @method CoupSpeciale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoupSpecialeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoupSpeciale::class);
    }

    public function add(CoupSpeciale $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CoupSpeciale $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CoupSpeciale[] Returns an array of CoupSpeciale objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CoupSpeciale
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
