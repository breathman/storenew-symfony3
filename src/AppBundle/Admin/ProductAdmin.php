<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 01.02.2017
 * Time: 13:40
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\FieldDescriptionInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AppBundle\Entity\Product;
use Sonata\AdminBundle\Show\ShowMapper;

class ProductAdmin extends AbstractAdmin
{

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->tab('Продукт')
                ->with('Основные')
                    ->add('model', 'text', array(), array('name' => 'Модель'))
                    ->add('manufacturer', 'sonata_type_model',
                        array(
                            'class' => 'AppBundle\Entity\Manufacturer',
                            'property' => 'name'
                        ),
                        array('name' => 'Производитель')
                    )
                    ->add('category', 'choice',
                        array(
                            'choices' => array(
                                Product::CATEGORY_PHONES => 'Телефоны',
                                Product::CATEGORY_TABLES => 'Планшеты'
                            ),
                            'sortable' => true,
                        ),
                        array('name' => 'Категория')
                    )
                ->end()

                ->with('Описание')
                    ->add('title', 'text', array(), array('name' => 'Псевдоним'))
                    ->add('description', 'textarea', array('required' => false), array('name' => 'Описание'))
                ->end()
            ->end()

            ->tab('Характеристики')
                ->with('Неизменяемые свойства')
                    ->add('attributes', 'sonata_type_collection',
                        array(
                            'by_reference' => false,
                            'required' => false
                        ),
                        array(
                            'edit' => 'inline',
                            'inline' => 'table',
                            'name' => 'Список свойств'
                        )
                    )
                ->end()
            ->end()
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('model', null, array(
                'label' => 'Модель'
            ))
            ->add('manufacturer.name', null, array(
                'label' => 'Производитель',
                'show_filter' => true,
            ))
            ->add('createdAt', null, array(
                'label' => 'Дата создания'
            ))
            ->add('updatedAt', null, array(
                'label' => 'Последнее обновление'
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('model', null, array(
                'label' => 'Модель'
            ))
            ->add('manufacturer.name', null, array(
                'label' => 'Производитель'
            ))
            ->add('createdAt', 'datetime', array(
                'label' => 'Дата создания',
                'format' => 'd.m.Y H:i'
            ))
            ->add('updatedAt', 'datetime', array(
                'label' => 'Последнее обновление',
                'format' => 'd.m.Y H:i'
            ))
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                ),
                'label' => 'Действия'
            ))
        ;
    }

    /**
     * @param ShowMapper $show
     */
    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
            ->add('model')
            ->add('manufacturer.name')
            ->add('category')
            ->add('title')
            ->add('description')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('createdBy')
            ->add('updatedBy')
        ;
    }

    /**
     * @param string $object
     * @return string
     */
    public function toString($object) {
        return $object instanceof Product ? $object->getTitle() :  'Продукт';
    }

}