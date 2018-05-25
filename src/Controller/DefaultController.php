<?php

namespace App\Controller;

use App\Service\DativeConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
  public function index()
  {
    $name = 'Kastytis';
    $dative = $this->get(DativeConverter::class)->convert($name);

    return new Response($name . ' => ' . $dative);
  }
}
