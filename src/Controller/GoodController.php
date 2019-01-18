<?php

namespace App\Controller;

use App\Entity\Good;
use App\Enum\TypeGoodEnum;
use App\Form\GoodCreationFormType;
use App\Repository\GoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class GoodController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(GoodRepository $goodRepository)
    {

        $goods = $goodRepository->findAll();

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

    /**
     * @Route("/getGood", name="getGood")
     */
    public function getGoodByAPI()
    {
        $goodRepository = $this->getDoctrine()->getRepository(Good::class);
        $goods = $goodRepository->findAll();

        $encoder = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoder);

        $json = $serializer->serialize($goods, 'json');

        return $json;
    }

    /**
     * @Route("/getGood/{id}", name="getGoodId")
     */
    public function getGoodByAPIByID(int $id)
    {
        $goodRepository = $this->getDoctrine()->getRepository(Good::class);
        $goods = $goodRepository->find($id);

        $encoder = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoder);

        $json = $serializer->serialize($goods, 'json');

        return $json;
    }
}
