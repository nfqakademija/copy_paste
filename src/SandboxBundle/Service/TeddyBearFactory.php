<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 12.49
 */

namespace SandboxBundle\Service;

use SandboxBundle\Event\Events;
use SandboxBundle\Event\PreCreateEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;

class TeddyBearFactory
{
    /**
     * @var EventDispatcher
     */
    private $eventDispatcher;

    public function __construct($eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function create()
    {
        $teddyBear = new TeddyBear();
        $teddyBearHead = new TeddyBearHead();
        $teddyBearHead->setEarCount(2)
            ->setEyeCount(2)
            ->setFaceExpression("smiling")
            ->setNoseShape("pointy");
        $teddyBearBody = new TeddyBearBody();
        $teddyBearBody->setArmCount(2)
            ->setBodyColor("brown")
            ->setLegCount(2);
        $teddyBear->setBody($teddyBearBody)
            ->setHead($teddyBearHead);
        $this->eventDispatcher->dispatch(Events::PRE_CREATE, new PreCreateEvent($teddyBear));

        return $teddyBear;
    }
}