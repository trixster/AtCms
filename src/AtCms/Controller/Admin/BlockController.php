<?php

namespace AtCms\Controller;

use AtCms\Grid;
use AtDataGrid\Controller\DataGridController;
use AtDataGrid\DataGrid\DataSource;
use AtDataGrid\DataGrid\Renderer;

class Admin_BlockController extends DataGridController
{
    /**
     * @return \AtCms\Grid\Block
     */
    public function getGrid()
    {
        // Setup data source
        $dataSource = new DataSource\ZendDbTableGateway(array(
            'table'        => 'cms_block',
            'dbAdapter'    => $this->getServiceLocator()->get('atcms_zend_db_adapter'),
        ));

        // Configure renderer
        $renderer = new Renderer\Html();
        $renderer->setEngine($this->getServiceLocator()->get('Zend\View\Renderer\PhpRenderer'))
                 ->setCssFile('/css/modules/at-cms.css');

        // Create grid
        $grid = new Grid\Block($dataSource, array(
            'order'        => $this->params()->fromQuery('order', 'block_id~asc'),
            'currentPage'  => $this->params()->fromQuery('page'),
            'itemsPerPage' => $this->params()->fromQuery('show_items'),
            'renderer'     => $renderer
        ));

        $this->grid = $grid;

        return $this->grid;
    }
}
