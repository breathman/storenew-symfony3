<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 19.01.2017
 * Time: 18:47
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    /**
     * @return Product[]
     */
    public function findAllProductsOrderedByProducer() {

        return $this->createQueryBuilder('product')
            ->orderBy('product.manufacturer', 'ASC')
            ->getQuery()
            ->execute();

    }

}