<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StudentaiController extends Controller
{

    /**
     * @Route("/studentai", name="studentai")
     */
    public function index()
    {
        $data = file_get_contents('./json/data.json');
        $json = json_decode($data);

        return $this->render('studentai/index.html.twig', [
            'title' => 'Studentai',

        ]);
    }

    public function evaluation()
    {
        return $this->render('studentai/evaluation.html.twig', [
            'studentName' => '',
            'team' => '',
            'mentorName' => '',
        ]);
    }
}
