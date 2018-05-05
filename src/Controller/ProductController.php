<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Products;
use Symfony\Flex\Response;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Products();
        $product->setTitle('Title');
        $product->setPrice(100);
        $product->setCategoryId(1);
        $product->setActive(1);

        $entityManager->persist($product);
        $entityManager->flush();


        return new Response('Save new product with id '.$product->getId());
    }
}
