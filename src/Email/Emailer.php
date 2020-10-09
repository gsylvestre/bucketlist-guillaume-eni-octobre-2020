<?php

namespace App\Email;

use App\Entity\Idea;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Mailer\MailerInterface;

/**
 * Cette classe est un service !
 * Ce n'est qu'une démo, ça ne fait rien de concret pour l'isntant...
 * mais on pourrait y regrouper toutes nos fonctions d'envois de mail
 */
class Emailer
{

    private $mailer; //contiendra le mailer de Symfony
    private $doctrine; //contiendra doctrine

    //on demande à symfony de nous injecter les autres services dont nous avons besoin ici !
    public function __construct(MailerInterface $mailer, ManagerRegistry $doctrine)
    {
        //on les stocke sur les attributs de la classe, pour les rendre dispo aux autres méthodes
        $this->mailer = $mailer;
        $this->doctrine = $doctrine;
    }

    //enverrait un email aux admins quand une nouvelle idée est créée
    public function sendNewIdeaWarningToAdmin(Idea $idea)
    {
        //$this->doctrine->getRepository(User::class)->findBy
        //$this->mailer->send();
    }

    //par exemple
    public function sendForgottenPasswordLink(string $email)
    {

    }
}