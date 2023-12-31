<?php

namespace App\Repository\Joystick;

use App\Entity\Joystick\Joystick;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Joystick>
 *
 * @method Joystick|null find($id, $lockMode = null, $lockVersion = null)
 * @method Joystick|null findOneBy(array $criteria, array $orderBy = null)
 * @method Joystick[]    findAll()
 * @method Joystick[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoystickRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Joystick::class);
    }

//    /**
//     * @return Joystick[] Returns an array of Joystick objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Joystick
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
