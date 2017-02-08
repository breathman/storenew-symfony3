<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 01.02.2017
 * Time: 12:55
 */

namespace AppBundle\Admin;


use AppBundle\Entity\AttributeGroup;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class AttributeGroup Admin
 * @package AppBundle\Admin
 */
class AttributeGroupAdmin extends AbstractAdmin
{

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('name', 'text')
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('name')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('name')
        ;
    }

    /**
     * @param string $object
     * @return string
     */
    public function toString($object) {
        return $object instanceof AttributeGroup ? $object->getName() :  'Группа атрибутов';
    }

}