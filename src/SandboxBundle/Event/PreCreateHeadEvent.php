<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 13.18
 */

namespace SandboxBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class PreCreateHeadEvent extends Event
{
    const NAME = 'app.pre_create_head';

    private $teddyBearHead;

    public function __construct($teddyBearHead)
    {
        $this->setTeddyBearHead($teddyBearHead);
    }

    /**
     * @return mixed
     */
    public function getTeddyBearHead()
    {
        return $this->teddyBearHead;
    }

    /**
     * @param mixed $teddyBearHead
     */
    public function setTeddyBearHead($teddyBearHead)
    {
        $this->teddyBearHead = $teddyBearHead;
    }


}