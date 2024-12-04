<?php

namespace App\Repository;

use App\Entity\Annonce;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Annonce>
 */
class AnnonceRepository extends ServiceEntityRepository
{
    private PaginatorInterface $paginator;

    public function __construct(ManagerRegistry $registry,PaginatorInterface $paginator)
    {
        parent::__construct($registry, Annonce::class);
        $this->paginator =$paginator;
    }
    public function paginateAnnonce (int $page)
    {
        return $this->paginator->paginate($this->createQueryPaginate(),$page,4);
    }
    public function createQueryPaginate(){
        return $this->createQueryBuilder('a')
        ->orderBy('a.createdAt','DESC');
    }

    //    /**
    //     * @return Annonce[] Returns an array of Annonce objects
    //     */
       public function findByUser( User $user): array
       {
           return $this->createQueryBuilder('a')
               ->andWhere('a.user = :user')
               ->setParameter('user', $user)
               ->getQuery()
               ->getResult()
           ;
       }

    //    public function findOneBySomeField($value): ?Annonce
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
