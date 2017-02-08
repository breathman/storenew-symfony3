<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 01.02.2017
 * Time: 12:55
 */

namespace AppBundle\Admin;


use AppBundle\Entity\Attribute;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class Attribute Admin
 * @package AppBundle\Admin
 */
class AttributeAdmin extends AbstractAdmin
{

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('attribute_group', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\AttributeGroup',
                'property' => 'name'
            ))
            ->add('value', 'text')
            ->add('metric', 'text', array(
                'required' => false
            ))
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('attribute_group.name')
            ->add('value')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('value')
            ->add('attribute_group.name')
            ->add('metric')
        ;
    }

    /**
     * @param string $object
     * @return string
     */
    public function toString($object) {
        return $object instanceof Attribute ? $object->getValue() :  'Aтрибут';
    }

}