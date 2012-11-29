<?php

namespace AtCms\Grid;

use AtDataGrid\DataGrid;
use AtDataGrid\DataGrid\Filter\Sql as SqlFilter;
use AtDataGrid\DataGrid\Column\Decorator;
use Zend\Form\Element;

class Block extends DataGrid\DataGrid
{
    public function init()
    {
        parent::init();

        $this->setCaption('Manage blocks')
             ->setIdentifierColumnName('block_id');
    }
}