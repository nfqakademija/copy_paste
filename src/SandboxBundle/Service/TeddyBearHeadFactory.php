<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 12.49
 */

namespace SandboxBundle\Service;

use SandboxBundle\Event\Events;
use SandboxBundle\Event\EventSubscriber;
use SandboxBundle\Event\PreCreateHeadEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;

class TeddyBearHeadFactory
{

    const DEFAULT_EAR_COUNT = 2;
    const DEFAULT_EYE_COUNT = 2;
    const DEFAULT_FACE_EXPRESSION = "smiling";
    const DEFAULT_NOSE_SHAPE = "pointy";

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
        $teddyBearHead = new TeddyBearHead();
        $teddyBearHead->setEarCount(self::DEFAULT_EAR_COUNT)
            ->setEyeCount(self::DEFAULT_EYE_COUNT)
            ->setFaceExpression(self::DEFAULT_FACE_EXPRESSION)
            ->setNoseShape(self::DEFAULT_NOSE_SHAPE);
        $subscriber = new EventSubscriber();
        $this->eventDispatcher->addSubscriber($subscriber);
        $this->eventDispatcher->dispatch(Events::PRE_CREATE_HEAD, new PreCreateHeadEvent($teddyBearHead));

        return $teddyBearHead;
    }
}