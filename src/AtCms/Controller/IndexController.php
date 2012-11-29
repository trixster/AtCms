<?php

namespace AtCms\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $identifier = $this->getEvent()->getRouteMatch()->getParam('id');
        if (!$identifier) {
            return $this->notFoundAction();
        }

        $mapper = $this->getServiceLocator()->get('atcms_page_mapper');
        $page = $mapper->findByIdentifier($identifier);

        if (!$page) {
            return $this->notFoundAction();
        }

        if (!$page->getIsActive()) {
            return $this->notFoundAction();
        }

        return new ViewModel(
            array('page' => $page)
        );
    }
}
