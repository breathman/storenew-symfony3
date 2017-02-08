<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 01.02.2017
 * Time: 12:55
 */

namespace AppBundle\Admin;


use AppBundle\Entity\Manufacturer;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class ManufacturerAdmin
 * @package AppBundle\Admin
 */
class ManufacturerAdmin extends AbstractAdmin
{

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('name', 'text')
            ->add('description', 'textarea')
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('name')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('name')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    /**
     * @param string $object
     * @return string
     */
    public function toString($object) {
        return $object instanceof Manufacturer ? $object->getName() :  'Производитель';
    }


}