<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/getUser", name="getUser")
     */
    public function getUserByAPI()
    {
        $goodRepository = $this->getDoctrine()->getRepository(User::class);
        $goods = $goodRepository->findAll();

        $encoder = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoder);

        $json = $serializer->serialize($goods, 'json');

        return $json;
    }

    /**
     * @Route("/getUser/{id}", name="getUserId")
     */
    public function getUserByAPIByID(int $id)
    {
        $goodRepository = $this->getDoctrine()->getRepository(User::class);
        $goods = $goodRepository->find($id);

        $encoder = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoder);

        $json = $serializer->serialize($goods, 'json');

        return $json;
    }
}
