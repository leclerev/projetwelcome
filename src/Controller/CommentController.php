<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentController extends AbstractController
{
    public function index(CommentRepository $repository)
    {

        $comments = $repository->findAll();
        dump($comments);
        return $this->render('comment/index.html.twig', [
            'comments' => $comments
        ]);
    }
}
