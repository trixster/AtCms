<?php

namespace AtCms\Entity;

interface PageInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $pageId
     * @return mixed
     */
    public function setId($pageId);
}
