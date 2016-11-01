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
use SandboxBundle\Service\TeddyBearBodyFactory;
use SandboxBundle\Service\TeddyBearHeadFactory;

class TeddyBearFactory
{
    /**
     * @var EventDispatcher
     */
    private $eventDispatcher;
    private $teddyBearHeadFactory;
    private $teddyBearBodyFactory;

    public function __construct($eventDispatcher, $teddyBearHeadFactory, $teddyBearBodyFactory)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->teddyBearHeadFactory = $teddyBearHeadFactory;
        $this->teddyBearBodyFactory = $teddyBearBodyFactory;
    }

    public function create()
    {
        $teddyBear = new TeddyBear();
        $teddyBearHead = $this->teddyBearHeadFactory->create();
        $teddyBearBody = $this->teddyBearBodyFactory->create();
        $teddyBear->setBody($teddyBearBody)
            ->setHead($teddyBearHead);

        return $teddyBear;
    }
}