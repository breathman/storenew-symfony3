<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 30.01.2017
 * Time: 18:00
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_attribute")
 */
class ProductAttribute
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Product", inversedBy="attributes")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Attribute")
     */
    private $attribute;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product = null)
    {
        $this->product = $product;
    }

    /**
     * @return Attribute
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param Attribute $attribute
     */
    public function setAttribute(Attribute $attribute)
    {
        $this->attribute = $attribute;
    }

}