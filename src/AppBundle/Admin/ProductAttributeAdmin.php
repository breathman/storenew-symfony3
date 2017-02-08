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
 * Class Product Attribute Admin
 * @package AppBundle\Admin
 */
class ProductAttributeAdmin extends AbstractAdmin
{

    protected $parentAssociationMapping = 'product';

    public function getParentAssociationMapping() {
        return 'product';
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
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
            ->add('product.title')
            ->add('attribute.value')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('product.title')
            ->add('attribute.value')
            ->add('attribute.metric')
        ;
    }


}