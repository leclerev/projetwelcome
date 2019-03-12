<?php

namespace App\Controller;

use App\Entity\Property;
use App\Entity\Visitor;
use GraphAware\Neo4j\OGM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(EntityManagerInterface $em)
    {
        $visitor = $this->get('session')->get('visitorId');
        $user = $em->getRepository(Visitor::class)->findOneBy(['name' => $visitor]);

        if(!$user) {
            $newUser = new Visitor('John Doe');
            //$newProp = new Property();
            //$newProp->setName('');
            ///$newProp->setAddress('');
            $em->persist($newUser);
            ///$em->persist($newProp);
            $em->flush();
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

}
