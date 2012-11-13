<?php

namespace AtCms\Controller;

use AtCms\Grid;
use AtAdmin\Controller\DataGridController;
use AtAdmin\DataGrid\DataSource;
use AtAdmin\DataGrid\Renderer;

class Admin_PageController extends DataGridController
{
    /**
     * @return \AtCms\Grid\Page|void
     */
    public function getGrid()
    {
        // Setup data source
        $dataSource = new DataSource\ZendDbTableGateway(array(
            'table'        => 'cms_page',
            'dbAdapter'    => $this->getServiceLocator()->get('db'),
        ));

        // Configure renderer
        $renderer = new Renderer\Html();
        $renderer->setView($this->getServiceLocator()->get('Zend\View\Renderer\PhpRenderer'))
                 ->setCssFile('/css/modules/at-cms.css');

        // Create grid
        $grid = new Grid\Page($dataSource, array(
            'order'        => $this->params()->fromQuery('order', 'page_id~asc'),
            'currentPage'  => $this->params()->fromQuery('page'),
            'itemsPerPage' => $this->params()->fromQuery('show_items'),
            'renderer'     => $renderer
        ));

        $this->grid = $grid;

        return $this->grid;
    }
}
