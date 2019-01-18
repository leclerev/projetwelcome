<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentFormType;
use App\Repository\CommentRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends AbstractController
{

    private $em;

    public function __construct(ObjectManager $em)
    {
        $this->em = $em;
    }

    public function index(CommentRepository $repository, Request $request)
    {
        /**
         * TEST VARIABLES USER CONNCTED
         */
        $connected = 1;

        $comments = $repository->findAll();

        dump($comments);
        return $this->render('comment/index.html.twig', [
            'comments' => $comments,
            'connected' => $connected
        ]);
    }

    public function create(CommentRepository $repository, Request $request) {

        $comment = new Comment();
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            dump($form->getData());
        }

        return $this->render('comment/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update(CommentRepository $repository) {
        return $this->render('comment/update.html.twig', [
        ]);
    }

    public function delete(Comment $comment, Request $request) {
        dump($comment);
        if($this->isCsrfTokenValid('delete' .$comment->getId(), $request->get('_token'))) {
            $this->em->remove($comment);
            $this->em->flush();
        }
        return $this->redirectToRoute('comments');

    }
}
