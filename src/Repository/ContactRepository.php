<?php

namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactRequest::class);
    }

    public function findFeatured()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }

    public function findPaginated($page, $limit = 10)
    {
        $query = $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->getQuery();

        return $this->paginator->paginate($query, $page, $limit);
    }

    public function getStats()
    {
        $totalProperties = $this->createQueryBuilder('p')
            ->select('COUNT(p.id)')
            ->getQuery()
            ->getSingleScalarResult();

 
        return [
            'totalContacts' => $totalContacts,
      
        ];
    }
}