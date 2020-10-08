<?php


namespace App\Controller\Api;

use App\Repository\IdeaRepository;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiIdeaController extends AbstractController
{
    /**
     * @Route("/api/v1/idea", name="api_idea_list", methods={"GET"})
     */
    public function list(
        IdeaRepository $ideaRepository,
        SerializerInterface $serializer
    )
    {
        $ideas = $ideaRepository->findAll();
        $json = $serializer->serialize($ideas, 'json');

        $response = new JsonResponse();
        $response->setContent($json);
        return $response;
    }

    /**
     * @Route("/api/v1/idea/{id}", name="api_idea_detail", methods={"GET"})
     */
    public function detail(
        int $id,
        IdeaRepository $ideaRepository,
        SerializerInterface $serializer
    )
    {
        $idea = $ideaRepository->find($id);

        $json = $serializer->serialize($idea, 'json');

        $response = new JsonResponse();
        $response->setContent($json);
        return $response;
    }
}
