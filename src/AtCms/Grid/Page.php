<?php

namespace AtCms\Grid;

use AtAdmin\DataGrid;
use AtAdmin\DataGrid\Filter;
use AtAdmin\DataGrid\Column\Decorator;

class Page extends DataGrid\DataGrid
{
    public function init()
    {
        parent::init();

        $this->setCaption('Manage pages');

        // id
        $this->getColumn('page_id')
             ->setLabel('#')
             ->setVisibleInForm(false)
             ->setSortable(true);

        // uri
        $this->getColumn('identifier')
             ->setLabel('Идентификатор страницы (uri)')
             ->addFilter(new Filter\Like())
             ->setSortable(true);

        // title
        $this->getColumn('title')
             ->setLabel('Название')
             ->addFilter(new Filter\Like());

        // content
        //$content = new ATF_DataGrid_Column_Wysiwyg('content');
        $this->getColumn('content')
             ->setLabel('Текст')
             ->setVisible(false);
        //$this->addColumn($content, true);

        // description
        $this->getColumn('meta_description')
             ->setLabel('Meta description')
             ->setVisible(false);

        // keywords
        $this->getColumn('meta_keywords')
             ->setLabel('Meta keywords')
             ->setVisible(false);

        // created_at
        $this->getColumn('created_at')
             ->setLabel('Создана');

        // updated_at
        $this->getColumn('updated_at')
             ->setLabel('Обновлена');

        // is_active
        $this->getColumn('is_active')
             ->setLabel('Включена')
             ->addDecorator(new Decorator\YesNo());

        // sort_order
        $this->getColumn('sort_order')
             ->setLabel('Порядок сортировки');
   }
}