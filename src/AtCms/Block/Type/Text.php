<?php

namespace AtCms\Block\Type;

use AtCms\Entity\BlockInterface;
use AtCms\Block\Type\TypeInterface;

/**
 *
 */
class Text implements TypeInterface
{
    /**
     * {@inheritdoc}
     */
    function getDefaultSettings()
    {
        return array(
            'content' => 'Insert your custom text here',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockInterface $block)
    {
        $settings = array_merge($this->getDefaultSettings(), $block->getSettings());
        return $settings['content'];
    }
}