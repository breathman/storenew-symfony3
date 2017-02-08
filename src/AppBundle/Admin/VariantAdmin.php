<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 01.02.2017
 * Time: 12:55
 */

namespace AppBundle\Admin;


use AppBundle\Entity\Variant;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class Variant Admin
 * @package AppBundle\Admin
 */
class VariantAdmin extends AbstractAdmin
{

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('barcode', 'text')
            ->add('product', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Product',
                'property' => 'model'
            ))
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('barcode')
            ->add('product.manufacturer.name')
            ->add('product.model')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('barcode')
            ->addIdentifier('product.title')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    /**
     * @param string $object
     * @return string
     */
    public function toString($object) {
        return $object instanceof Variant ? $object->getBarcode() :  'Вариация';
    }

}