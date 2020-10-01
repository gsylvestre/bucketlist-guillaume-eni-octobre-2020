<?php

namespace App\Controller;

use App\Entity\Idea;
use App\Repository\IdeaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IdeaController extends AbstractController
{
    /**
     * @Route("/ideas", name="idea_list")
     */
    public function list(IdeaRepository $ideaRepository)
    {
        //récupère les 50 idées publiées les plus récentes
        $ideas = $ideaRepository->findBy(["isPublished" => true], ["dateCreated" => "DESC"], 50);

        return $this->render('idea/list.html.twig', [
            "ideas" => $ideas
        ]);
    }

    /**
     * @Route("/ideas/details/{id}", name="idea_details", requirements={"id": "\d+"})
     */
    public function details($id, IdeaRepository $ideaRepository)
    {
        //ou aussi
        //$entityManager = $this->getDoctrine()->getManager();
        //$ideaRepository = $entityManager->getRepository(Idea::class);

        //récupère une Idea en fonction de la clé primaire
        $idea = $ideaRepository->find($id);

        return $this->render('idea/details.html.twig', [
            "idea" => $idea
        ]);
    }
}
