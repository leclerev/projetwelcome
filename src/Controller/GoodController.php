<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\Property;
use App\Entity\Good;
use App\Entity\Visitor;
use App\Enum\TypeGoodEnum;
use App\Form\GoodCreationFormType;
use App\Repository\GoodRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use GraphAware\Neo4j\OGM\EntityManagerInterface;

class GoodController extends AbstractController
{
    /**
     * @Route("/consultGood", name="goodConsult")
     */
    public function goodConsultation(GoodRepository $goodRepository,EntityManagerInterface $emg)
    {

        $goods = $goodRepository->findAll();

        $visitor = $this->get('session')->get('visitorId');
        $user = $emg->getRepository(Visitor::class)->findOneBy(['name' => $visitor]);
        $bien = $emg->getRepository(Property::class)->findOneBy(['mySqlId' => 6]);

        $consult = null;

        if ($user && $bien){
            foreach ($user->getConsultation() as $consulte) {
                // on trouve la même proprité dans la collection de consultation du visiteur que celle consuiltée actuellemnt : il y a déjà une relation entre visitor et propoety
                if ($consulte->getProperty() == $bien)
                    $consult = $consulte;
            }

            if($consult == null)  {
                $consult = new Consultation(0);


                $user->addConsultation($consult);
                $bien->addConsultation($consult);

                $consult->setVisitor($user);
                $consult->setProperty($bien);
            } else {
                $consult->incQte(1);
            }

            $emg->persist($consult);
            $emg->flush();

        }

        return $this->render('good/index.html.twig', [
            'controller_name' => 'GoodController',
            'goods' => $goods,
            'typeGood' => TypeGoodEnum::$typeName,
            'urlImg' => array(1, 2, 3 ,4),
        ]);
    }

    /**
     * @Route("/createGood", name="goodCreate")
     */
    public function goodCreation(Request $request,EntityManagerInterface $emg)
    {
        $good = new Good();
        $form = $this->createForm(GoodCreationFormType::class, $good);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $good = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($good);
            $entityManager->flush();


           // creation d'un noeud ppté
            $bien = new Property( $good->getDescription(), $good->getAddress()->__toString(),$good->getId() );
            $emg->persist($bien);
            $emg->flush();
        }




        return $this->render('good/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
