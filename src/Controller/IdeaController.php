<?php

namespace App\Controller;

use App\Entity\Idea;
use App\Form\IdeaType;
use App\Repository\IdeaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IdeaController extends AbstractController
{

    /**
     * @Route("/ideas/add", name="idea_add")
     */
    public function add(Request $request)
    {
        $idea = new Idea();
        $ideaForm = $this->createForm(IdeaType::class, $idea);

        $ideaForm->handleRequest($request);

        if ($ideaForm->isSubmitted() && $ideaForm->isValid()) {
            //hydrater les propriétés manquantes
            $idea->setIsPublished(true);
            $idea->setDateCreated(new \DateTime());

            //sauvegarder l'entité en bdd
            $em = $this->getDoctrine()->getManager();
            $em->persist($idea);
            $em->flush();

            //ajoute un message en session pour l'afficher sur la prochaine page
            $this->addFlash('success', 'Your idea was created! Thanks dude!');

            //redirige vers la page de l'idée nouvellement créée
            return $this->redirectToRoute('idea_details', ['id' => $idea->getId()]);
        }

        return $this->render('idea/add.html.twig', [
            "ideaForm" => $ideaForm->createView()
        ]);
    }

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
