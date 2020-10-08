<?php

namespace App\Event;

use App\Entity\Idea;
use Symfony\Contracts\EventDispatcher\Event;

class IdeaCreatedEvent extends Event
{
    private $idea;

    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function getIdea(): Idea
    {
        return $this->idea;
    }
}