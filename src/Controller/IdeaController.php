<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IdeaController extends AbstractController
{
    /**
     * @Route("/ideas", name="idea_list")
     */
    public function list()
    {
        //@todo: aller chercher toutes les dernières idées dans la bdd

        return $this->render('idea/list.html.twig', [

        ]);
    }

    /**
     * @Route("/ideas/details/{id}", name="idea_details", requirements={"id": "\d+"})
     */
    public function details($id)
    {
        //@todo: aller chercher cette idée dans la bdd
        dump($id);

        return $this->render('idea/details.html.twig', [

        ]);
    }
}
