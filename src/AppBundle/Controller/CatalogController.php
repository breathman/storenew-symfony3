<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 22.11.2016
 * Time: 15:22
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CatalogController extends Controller
{
    /**
     * @Route("/{category}")
     * @return Response
     */
    public function indexAction($category) {
        return $this->render(':catalog:index.html.twig', array(
            'category' => $category,
        ));
    }

    /**
     * @Route("/catalog/{categoryName}")
     * @var String
     * @return Response
     */
    public function showAction($categoryName) {

        return $this->render(':catalog:show.html.twig', array(
            'category' => $categoryName
        ));

    }

    /**
     * @Route("/product")
     * @return Response
     */
    public function showProductAction() {

        return $this->render(':catalog:product.html.twig', array(
        ));

    }

    /**
     * @Route("/api/catalog/get_products/{category}", name="catalog_get_products")
     * @var String $category
     * @Method("GET")
     * @return Response
     */
    public function getProductsAction($category) {

        $phones = [
            ['id' => 1, 'category' => 'phones', 'vendor' => 'Apple', 'model' => 'iPhone 6S',  'color' => 'Gold',   'price' => 46000, 'uri' => '/images/iphone-6s-gold.jpg'],
            ['id' => 2, 'category' => 'phones', 'vendor' => 'Apple', 'model' => 'iPhone 6',   'color' => 'Black',  'price' => 26000, 'uri' => '/images/iphone-6-black.jpg'],
            ['id' => 3, 'category' => 'phones', 'vendor' => 'Apple', 'model' => 'iPhone 5S',  'color' => 'Silver', 'price' => 26000, 'uri' => '/images/iphone-5s-silver.jpg'],
        ];

        $tablets = [
            ['id' => 4, 'category' => 'tablets', 'vendor' => 'Apple', 'model' => 'iPad Air 2',  'color' => 'Gold',   'price' => 55000, 'uri' => '/images/ipad-air2-black.jpg'],
            ['id' => 5, 'category' => 'tablets', 'vendor' => 'Apple', 'model' => 'iPad Pro',    'color' => 'Black',  'price' => 85000, 'uri' => '/images/ipad-pro-silver.jpg'],
            ['id' => 6, 'category' => 'tablets', 'vendor' => 'Apple', 'model' => 'iPad Mini 4', 'color' => 'Silver', 'price' => 45000, 'uri' => '/images/ipad-mini4-gold.jpg'],
        ];

        $data = array(
            'products' => ($category == 'phones') ? $phones : $tablets,
        );

        return new JsonResponse($data, 200);

    }

}