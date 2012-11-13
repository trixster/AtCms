<?php

namespace AtCms\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Admin_IndexController extends AbstractActionController
{
    public function indexAction()
    {
        //var_dump($this->getEvent()->getRouteMatch()->getParams());exit;

        return new ViewModel();
    }
}
