<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 18/01/2019
 * Time: 13:31
 */

namespace App\Controller;


use App\Entity\Good;
use App\Repository\GoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/api", name="api")
 */
class APIController
{

    /**
     * @Route("/getGood", name="getGood")
     */
    public function getGoodByAPI(GoodRepository $goodRepository)
    {
        $goods = $goodRepository->findAll();

        $encoder = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoder);

        $response = new Response();

        $json = $serializer->serialize($goods, 'json');

        $response->setContent($json);

        $response->headers->set('Content-Type', 'application/json');

        return $response;

//        return $json;
    }

    /**
     * @Route("/getGood/{id}", name="getGoodId")
     */
    public function getGoodByAPIByID(int $id, GoodRepository $goodRepository)
    {
        $goods = $goodRepository->find($id);

        $encoder = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoder);

        $json = $serializer->serialize($goods, 'json');

        echo $json;
    }

}