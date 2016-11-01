<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 13.18
 */

namespace SandboxBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class PreCreateBodyEvent extends Event
{

    private $teddyBearBody;

    public function __construct($teddyBearBody)
    {
        $this->setTeddyBearBody($teddyBearBody);
    }

    /**
     * @return mixed
     */
    public function getTeddyBearBody()
    {
        return $this->teddyBearBody;
    }

    /**
     * @param mixed $teddyBearBody
     */
    public function setTeddyBearBody($teddyBearBody)
    {
        $this->teddyBearBody = $teddyBearBody;
    }


}