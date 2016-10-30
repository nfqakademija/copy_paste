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
     * @return mixed
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param mixed $head
     * @return TeddyBear
     */
    public function setHead($head)
    {
        $this->head = $head;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     * @return TeddyBear
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }



}