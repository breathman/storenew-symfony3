<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 26.01.2017
 * Time: 15:20
 */

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;


/**
 * @ORM\Entity
 * @ORM\Table(name="manufacturer")
 */
class Manufacturer
{

    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}