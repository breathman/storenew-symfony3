<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 12.01.2017
 * Time: 12:32
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 * @ORM\Table(name="product")
 */
class Product
{

    use TimestampableEntity;
    use BlameableEntity;

    const CATEGORY_PHONES = 'Телефоны';
    const CATEGORY_TABLES = 'Планшеты';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Manufacturer")
     */
    private $manufacturer;

    /**
     * @ORM\Column(type="string")
     */
    private $model;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $category;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProductAttribute", mappedBy="product")
     */
    private $attributes;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->attributes = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Manufacturer
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param Manufacturer $manufacturer
     */
    public function setManufacturer(Manufacturer $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
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

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param $attribute
     */
    public function setAttributes($attribute)
    {
        $this->attributes[] = $attribute;
    }

    public function addAttribute(ProductAttribute $attribute) {
        $this->attributes[] = $attribute;
    }

    public function removeAttribute(ProductAttribute $attribute) {
        $this->attributes->removeElement($attribute);
        $attribute->setProduct(null);
    }

}