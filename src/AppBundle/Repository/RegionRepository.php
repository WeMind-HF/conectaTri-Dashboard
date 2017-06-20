<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * RegionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RegionRepository extends \Doctrine\ORM\EntityRepository
{
    public function countSupplierByRegion()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT r.name, 
                  (SELECT COUNT(s.id)
                  FROM AppBundle:Supplier s
                  WHERE s.region = r.id
                  ) AS y
                  FROM AppBundle:Region r  
                  GROUP BY r.name'
            )
            ->getResult();

    }
}
