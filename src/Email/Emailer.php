<?php

namespace App\Email;

use App\Entity\Idea;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Mailer\MailerInterface;

class Emailer
{

    private $mailer;
    /**
     * @var ManagerRegistry
     */
    private $doctrine;

    public function __construct(MailerInterface $mailer, ManagerRegistry $doctrine)
    {

        $this->mailer = $mailer;
        $this->doctrine = $doctrine;
    }

    public function sendNewIdeaWarningToAdmin(Idea $idea)
    {
        //$this->doctrine->getRepository(User::class)->findBy
        //$this->mailer->send();
    }

    public function sendForgottenPasswordLink(string $email)
    {

    }
}