<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 01.02.2017
 * Time: 12:55
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class Variant Attribute Admin
 * @package AppBundle\Admin
 */
class VariantAttributeAdmin extends AbstractAdmin
{

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('variant', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Variant',
                'property' => 'product.title'
            ))
            ->add('attribute', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Attribute',
                'property' => 'value'
            ))
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('variant.product.title')
            ->add('attribute.value')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('variant.product.title')
            ->add('attribute.value')
            ->add('attribute.metric')
        ;
    }

}