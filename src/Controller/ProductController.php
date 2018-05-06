<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Products;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Flex\Response;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function createProductAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Products();
        $product->setTitle('Title');
        $product->setPrice(100);
        $product->setActive(false);

        $category = new Categories();
        $category->setTitle('Category Title');

        $product->setCategoryId($category);

        $entityManager->persist($product);
//        $entityManager->persist($category);
        $entityManager->flush();

        $entityManager->remove($product);
        $entityManager->flush();

        exit();
    }

}
