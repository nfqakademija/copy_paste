<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 13.17
 */

namespace SandboxBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use SandboxBundle\Event\Events;


class EventSubscriber implements EventSubscriberInterface
{

    const TEDDYBEAR_FACE_EXPRESSION = "angry";

    public static function getSubscribedEvents()
    {
        return array(
             EVENTS::PRE_CREATE_HEAD => 'onChangeHead'
        );
    }

    public function onChangeHead($event) {
        $teddyBearHead = $event->getTeddyBearHead();
        $teddyBearHead->setFaceExpression(self::TEDDYBEAR_FACE_EXPRESSION);
    }

}