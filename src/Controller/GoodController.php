<?php

namespace App\Controller;

use App\Entity\Good;
use App\Form\GoodCreationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GoodController extends AbstractController
{
    /**
     * @Route("/good", name="good")
     */
    public function index()
    {

        $repository = $this->getDoctrine()->getRepository(Good::class);
        //$good = $repository->find(1);
        $goods = $repository->findAll();

        return $this->render('good/index.html.twig', [
            'controller_name' => 'GoodController',
            'goods' => $goods
        ]);
    }

    /**
     * @Route("/createGood", name="goodCreate")
     */
    public function goodCreation(Request $request)
    {
        $good = new Good();
        $form = $this->createForm(GoodCreationFormType::class, $good);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('good');
        }

        return $this->render('good/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
