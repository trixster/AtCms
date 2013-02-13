<?php

namespace AtCms\Block\Type;

use AtCms\Entity\BlockInterface;

interface TypeInterface
{
    /**
     * Returns the default settings link to the service
     *
     * @return array
     */
    public function getDefaultSettings();

    /**
     * @return mixed
     */
    public function execute(BlockInterface $block);
}