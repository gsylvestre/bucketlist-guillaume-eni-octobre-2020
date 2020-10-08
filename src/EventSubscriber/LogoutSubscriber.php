<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LogoutEvent;

class LogoutSubscriber implements EventSubscriberInterface
{
    public function onLogoutEvent(LogoutEvent $event)
    {
        if (true) {
            //$event->getResponse()->setTargetUrl("https://lingscar.com");
        }

        $event->getRequest()->getSession()->getFlashBag()->add('success', 'brravavavaooo déconnecté');
        $event->getRequest()->getSession()->getFlashBag()->add('success', 'brravavavaooo déconnecté bis');
    }

    public function pifPaf(LogoutEvent $event)
    {
    }

    public static function getSubscribedEvents()
    {
        return [
            LogoutEvent::class => [
                ['pifPaf'],
                ['onLogoutEvent'],
            ]
        ];
    }
}
