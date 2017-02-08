<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 16.01.2017
 * Time: 15:59
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Product;
use AppBundle\Entity\ProductAttribute;
use AppBundle\Entity\ProductProperty;
use AppBundle\Entity\ProductVariant;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{


    /**
     * @Route("/product/new")
     * @Method("GET")
     * @return Response
     */
    public function newAction() {





        return new Response('Product attributes created');

    }

    /**
     * @Route("/product/list", name="product_list")
     * @Method("GET")
     * @return Response
     */
    public function listAction() {

        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('AppBundle:Product')->findAllProductsOrderedByProducer();

        return $this->render(':product:list.html.twig', array(
            'products' => $products,
        ));

    }

    /**
     * @Route("/product/{productTitle}", name="product_show")
     * @Method("GET")
     * @return Response
     */
    public function showAction($productTitle) {

        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository('AppBundle:Product')->findOneBy(['title' => $productTitle]);

        if (!$product) {
            throw $this->createNotFoundException('product not found');
        }

        return $this->render(':product:show.html.twig', array(
            'product' => $product,
        ));

    }

}