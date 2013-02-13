<?php

namespace AtCms\Entity;

/**
 *
 */
class Block extends AbstractBlock
{
    /**
     * @var mixed
     */
    protected $id;

    /**
     * @param mixed $id
     * @return $this|void
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}