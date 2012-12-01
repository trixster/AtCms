<?php

namespace AtCms\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Block extends AbstractHelper
{
    /**
     * @param int|string $identifier
     * @return string
     */
    public function __invoke($identifier)
    {
        if (is_int($identifier)) {
            $html = '<h1>block</h1>';
        } elseif (is_string($identifier)) {
            $html = '<h1>block</h1>';
        } else {
            throw new \Exception('Wrong block identifier provided.');
        }

        return $html;
    }
}
