<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StudentaiController extends Controller
{

    /**
     * @Route("/studentai", name="studentai")
     */
    public function index()
    {
        $dataJson = file_get_contents(__DIR__ . '/json/data.json');
        $json = json_decode($dataJson, true);


        return $this->render('studentai/index.html.twig', [
            'title' => 'Studentai',
            'studentName' => '',
            'json' => $json,

        ]);
    }

    /**
     * @Route("/evaluation", name="evaluation")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function evaluation(Request $request)
    {
        $success = false;
        if ($request->get('utm_term') === 'Olga' && $request->get('utm_content') === 'Wish A Gift') {
            $success = true;
        }

        return $this->render('studentai/evaluation.html.twig', [
            'title' => 'Evaluation',
            'team' => $request->get('utm_content'),
            'mentorName' => $request->get('utm_campaign'),
            'studentName' => $request->get('utm_term'),
            'success' => $success,
        ]);
    }
}
