<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 14.00
 */

namespace SandboxBundle\Service;


class TeddyBearHead
{
    private $eyeCount;

    private $earCount;

    private $noseShape;

    private $faceExpression;

    /**
     * @return mixed
     */
    public function getEyeCount()
    {
        return $this->eyeCount;
    }

    /**
     * @param mixed $eyeCount
     * @return TeddyBearHead
     */
    public function setEyeCount($eyeCount)
    {
        $this->eyeCount = $eyeCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEarCount()
    {
        return $this->earCount;
    }

    /**
     * @param mixed $earCount
     * @return TeddyBearHead
     */
    public function setEarCount($earCount)
    {
        $this->earCount = $earCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoseShape()
    {
        return $this->noseShape;
    }

    /**
     * @param mixed $noseShape
     * @return TeddyBearHead
     */
    public function setNoseShape($noseShape)
    {
        $this->noseShape = $noseShape;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFaceExpression()
    {
        return $this->faceExpression;
    }

    /**
     * @param mixed $faceExpression
     * @return TeddyBearHead
     */
    public function setFaceExpression($faceExpression)
    {
        $this->faceExpression = $faceExpression;
        return $this;
    }


}