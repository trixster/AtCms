<?php

namespace AtCms\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * Turn off strict options mode
     */
    protected $__strictMode__ = false;

    /**
     * @var string
     */
    protected $pageEntityClass = 'AtCms\Entity\Page';


    /**
     * Set page entity class name
     *
     * @param $pageEntityClass
     * @return ModuleOptions
     */
    public function setPageEntityClass($pageEntityClass)
    {
        $this->pageEntityClass = $pageEntityClass;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageEntityClass()
    {
        return $this->pageEntityClass;
    }
}