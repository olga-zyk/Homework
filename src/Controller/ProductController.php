<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Products;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
//    public function createProductAction()
//    {
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $category = new Categories();
//        $category->setTitle('Category Title 1');
//
//        $product = new Products();
//        $product->setTitle('Product1');
//        $product->setPrice(100);
//        $product->setActive(false);
//
//        $product->setCategory($category);
//
//        $entityManager->persist($product);
//
//        $entityManager->flush();
//
//        echo 'The product was added to database';
//
//        return (new Response(' Saved new product with id '.$product->getId()));
//
//    }

    public function removeProductAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $category = new Categories();
        $category->setTitle('New Category Title');

        $product = new Products();
        $product->setTitle('New product title');
        $product->setPrice(99);
        $product->setActive(true);

        $category->addProduct($product);
        $entityManager->persist($product);
        $entityManager->flush();

        $category->removeProduct($product);
        $entityManager->remove($product);
        $entityManager->flush();

        echo 'Product was removed form database';

        exit();
    }



}
