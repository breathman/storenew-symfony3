<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 18.01.2017
 * Time: 16:05
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\ProductAttribute;
use AppBundle\Entity\VariantAttribute;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Provider\Base;
use Nelmio\Alice\Fixtures;
use AppBundle\DataFixtures\ORM\AttributeProvider as Attribute;
use Nelmio\Alice\Instances\Processor\Methods\Faker;

class LoadFixtures implements FixtureInterface
{

    public function load(ObjectManager $manager) {

        $base_fixtures = array(
            __DIR__.'/attribute_group.yml',
            __DIR__.'/manufacturer.yml',
            __DIR__.'/attribute.yml',
            __DIR__.'/product.yml',
            __DIR__.'/variant.yml',
            __DIR__.'/vendor.yml',
            __DIR__.'/offer.yml',
        );

        $objects = Fixtures::load($base_fixtures, $manager, array(
            'providers' => array($this, Attribute::class),
            'locale' => 'ru_RU',
            'seed' => 0,
            'persist_once' => false,
        ));

        $this->productAttributesGenerate($manager);
        $this->variantAttributesGenerate($manager);


    }

    protected function productAttributesGenerate(ObjectManager $em) {

        $products = $em->getRepository('AppBundle:Product')->findAll();
        $attributes = $em->getRepository('AppBundle:Attribute')->findAll();

        foreach ($products as $product) {

            for ($i=0; $i<2; $i++) {
                $productAttribute = new ProductAttribute();
                $productAttribute->setProduct($product);
                $productAttribute->setAttribute($attributes[array_rand($attributes)]);
                $em->persist($productAttribute);
                $em->flush();
            }

        }

    }

    protected function variantAttributesGenerate(ObjectManager $em) {

        $variants = $em->getRepository('AppBundle:Variant')->findAll();
        $attributes = $em->getRepository('AppBundle:Attribute')->findAll();

        foreach ($variants as $variant) {

            for ($i=0; $i<2; $i++) {
                $variantAttribute = new VariantAttribute();
                $variantAttribute->setVariant($variant);
                $variantAttribute->setAttribute($attributes[array_rand($attributes)]);
                $em->persist($variantAttribute);
                $em->flush();
            }

        }

    }

    public function model() {
        $list = array(
            'iPhone 4',
            'iPhone 4S',
            'iPhone 5',
            'iPhone 5S',
            'iPhone 6',
            'iPhone 6S',
            'iPhone 7',
            'iPhone 7S',
            'Galaxy 6',
            'Galaxy 6 Edge',
            'Galaxy 7 Edge',
            'Galaxy 7',
            'Honor 8',
            'Honor 9',
            'P9',
            'P9 Lite',
        );

        $key = array_rand($list);
        return $list[$key];
    }

    public function manufacturer() {
        $list = array(
            'Apple',
            'Samsung'
        );

        $key = array_rand($list);
        return $list[$key];
    }

}