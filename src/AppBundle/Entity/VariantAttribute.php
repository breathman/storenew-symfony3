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
 * @ORM\Table(name="variant_attribute")
 */
class VariantAttribute
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Variant")
     */
    private $variant;

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
     * @return Variant
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * @param Variant $variant
     */
    public function setVariant(Variant $variant)
    {
        $this->variant = $variant;
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