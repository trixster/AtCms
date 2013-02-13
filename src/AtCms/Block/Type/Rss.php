<?php

namespace AtCms\Block\Type;

use AtCms\Block\BlockTypeInterface;

/**
 *
 */
class Rss implements BlockTypeInterface
{
    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $settings = array_merge($this->getDefaultSettings(), $this->getSettings());
        return $settings['content'];
    }

    /**
     * {@inheritdoc}
     */
    function getDefaultSettings()
    {
        return array(
            'content' => 'Insert your custom text here',
        );
    }
}