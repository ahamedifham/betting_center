<?php
/**
 * Created by PhpStorm.
 * User: ifham
 * Date: 10/6/16
 * Time: 12:24 PM
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class BetRepository extends EntityRepository
{
    public function count(){
        $qb = $this->createQueryBuilder('p');
        $qb->select('count(p.id)');
        $result = $qb->getQuery()->getSingleScalarResult();
        return $result;
    }

    public function profile($id){
        $qb = $this->createQueryBuilder('p');
        $qb->where('p.id = :id')
            ->setParameter('id', $id)
        ;
        $result = $qb->getQuery()->getSingleResult();
        return $result;
    }
}