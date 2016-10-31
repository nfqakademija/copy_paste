<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 12.49
 */

namespace SandboxBundle\Service;

use SandboxBundle\Event\Events;
use SandboxBundle\Event\PreCreateBodyEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;

class TeddyBearBodyFactory
{

    const DEFAULT_ARM_COUNT = 2;
    const DEFAULT_BODY_COLOR = "brown";
    const DEFAULT_LEG_COUNT = 2;

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
        $teddyBearBody = new TeddyBearBody();
        $teddyBearBody->setArmCount(self::DEFAULT_ARM_COUNT)
            ->setBodyColor(self::DEFAULT_BODY_COLOR)
            ->setLegCount(self::DEFAULT_LEG_COUNT);
        $this->eventDispatcher->dispatch(Events::PRE_CREATE_BODY, new PreCreateBodyEvent($teddyBearBody));

        return $teddyBearBody;
    }
}