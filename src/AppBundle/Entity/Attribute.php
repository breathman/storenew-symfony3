<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 30.01.2017
 * Time: 15:23
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * @ORM\Entity
 * @ORM\Table(name="attribute", uniqueConstraints={@UniqueConstraint(name="attribute_idx", columns={"attribute_group_id", "value", "metric"})})
 */
class Attribute
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $value;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $metric;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AttributeGroup")
     */
    private $attribute_group;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getMetric()
    {
        return $this->metric;
    }

    /**
     * @param string $metric
     */
    public function setMetric($metric)
    {
        $this->metric = $metric;
    }

    /**
     * @return AttributeGroup
     */
    public function getAttributeGroup()
    {
        return $this->attribute_group;
    }

    /**
     * @param AttributeGroup $attribute_group
     */
    public function setAttributeGroup(AttributeGroup $attribute_group)
    {
        $this->attribute_group = $attribute_group;
    }

}