<?php

namespace App\Controller;

use App\Entity\Good;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GoodController extends AbstractController
{
    /**
     * @Route("/good", name="good")
     */
    public function index()
    {

        $repository=$this->getDoctrine()->getRepository(Good::class);
        //$good = $repository->find(1);
        $goods = $repository->findAll();


        return $this->render('good/index.html.twig', [
            'controller_name' => 'GoodController',
            'goods' => $goods
        ]);
    }
}
