<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.30
 * Time: 12.44
 */

namespace SandboxBundle\Service;


class TeddyBear
{

    private $head;

    private $body;

    /**
     * @return TeddyBearHead
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param TeddyBearHead $head
     * @return TeddyBear
     */
    public function setHead(TeddyBearHead $head)
    {
        $this->head = $head;
        return $this;
    }

    /**
     * @return TeddyBearBody
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param TeddyBearBody $body
     * @return TeddyBear
     */
    public function setBody(TeddyBearBody $body)
    {
        $this->body = $body;
        return $this;
    }



}