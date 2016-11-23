<?php
/**
 * Created by IntelliJ IDEA.
 * User: m.dykhalkin
 * Date: 22.11.2016
 * Time: 15:22
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CatalogController extends Controller
{
    /**
     * @Route("/")
     * @return Response
     */
    public function indexAction() {
        return $this->render(':catalog:index.html.twig', array());
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

}