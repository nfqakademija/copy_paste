<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 13.17
 */

namespace SandboxBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class EventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            'app.pre_create_head' => 'onChangeHead'
        );
    }

    public function onChangeHead($event) {
        $teddyBearHead = $event->getTeddyBearHead();
        $teddyBearHead->setFaceExpression("angry");
    }

}