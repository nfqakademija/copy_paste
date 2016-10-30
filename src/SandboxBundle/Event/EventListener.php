<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 13.16
 */

namespace SandboxBundle\Event;

use SandboxBundle\Service\TeddyBear;

class EventListener
{
    public function makeChanges($event)
    {
        /** @var TeddyBear $teddyBear */
        $teddyBear = $event->getTeddyBear();
        $teddyBear->getBody()->setBodyColor("yellow");
    }
}