<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 14.03
 */

namespace SandboxBundle\Service;


class TeddyBearBody
{
    private $bodyColor;

    private $legCount;

    private $armCount;

    /**
     * @return mixed
     */
    public function getBodyColor()
    {
        return $this->bodyColor;
    }

    /**
     * @param mixed $bodyColor
     * @return TeddyBearBody
     */
    public function setBodyColor($bodyColor)
    {
        $this->bodyColor = $bodyColor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLegCount()
    {
        return $this->legCount;
    }

    /**
     * @param mixed $legCount
     * @return TeddyBearBody
     */
    public function setLegCount($legCount)
    {
        $this->legCount = $legCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getArmCount()
    {
        return $this->armCount;
    }

    /**
     * @param mixed $armCount
     * @return TeddyBearBody
     */
    public function setArmCount($armCount)
    {
        $this->armCount = $armCount;
        return $this;
    }


}