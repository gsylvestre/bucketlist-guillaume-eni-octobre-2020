<?php

namespace App\EventSubscriber;

use App\Email\Emailer;
use App\Event\IdeaCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class IdeaEventSubscriber implements EventSubscriberInterface
{
    private $emailer;

    public function __construct(Emailer $emailer)
    {
        $this->emailer = $emailer;
    }

    public function onIdeaCreatedEvent(IdeaCreatedEvent $event)
    {
        $this->emailer->sendNewIdeaWarningToAdmin($event->getIdea());
    }

    public static function getSubscribedEvents()
    {
        return [
            IdeaCreatedEvent::class => 'onIdeaCreatedEvent',
        ];
    }
}
