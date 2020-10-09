<?php

namespace App\Event;

use App\Entity\Idea;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Cette classe est un événement personnalisé (custom event)
 * Elle représente l'événement de création d'une idée
 * Je l'ai créée à la mano (il n'y a pas de commande)
 */
class IdeaCreatedEvent extends Event
{
    private $idea;

    //on recoit l'Idea nouvellement créée en argument, ça parait logique
    //les subscribers auront donc accès à cette Idea
    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function getIdea(): Idea
    {
        return $this->idea;
    }
}