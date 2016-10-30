<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 13.18
 */

namespace SandboxBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class PreCreateEvent extends Event
{
    const NAME = 'app.pre_create';

    private $teddyBear;

    public function __construct($teddyBear)
    {
        $this->setTeddyBear($teddyBear);
    }

    /**
     * @return mixed
     */
    public function getTeddyBear()
    {
        return $this->teddyBear;
    }

    /**
     * @param mixed $teddyBear
     */
    public function setTeddyBear($teddyBear)
    {
        $this->teddyBear = $teddyBear;
    }


}