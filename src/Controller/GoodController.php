<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GoodController extends AbstractController
{
    /**
     * @Route("/good", name="good")
     */
    public function index()
    {
        return $this->render('good/index.html.twig', [
            'controller_name' => 'There',
        ]);
    }
}
