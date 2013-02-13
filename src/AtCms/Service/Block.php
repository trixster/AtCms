<?php

namespace AtCms\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use ZfcBase\EventManager\EventProvider;
use AtCms\Mapper\BlockInterface as BlockMapperInterface;
use AtCms\Service\BlockServiceInterface;
use AtCms\Entity\Block as BlockEntity;

class Block extends EventProvider implements ServiceManagerAwareInterface
{
    /**
     * @var array
     */
    protected $blockServices;

    /**
     * @var BlockMapperInterface
     */
    protected $blockMapper;

    /**
     * @var ServiceManager
     */
    protected $serviceManager;

    /**
     *
     */
    public function __construct()
    {
        $this->blockServices = array();
    }

    /**
     * @return \AtCms\Mapper\BlockInterface
     */
    public function getBlockMapper()
    {
        if (null === $this->blockMapper) {
            $this->blockMapper = $this->getServiceManager()->get('atcms_block_mapper');
        }
        return $this->blockMapper;
    }

    /**
     * @param \AtCms\Mapper\BlockInterface $blockMapper
     * @return Block
     */
    public function setBlockMapper(BlockMapperInterface $blockMapper)
    {
        $this->blockMapper = $blockMapper;
        return $this;
    }

    /**
     * Set service manager instance
     *
     * @param ServiceManager $serviceManager
     * @return Block
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }

    /**
     * @param $type
     * @param $options
     * @return Block
     */
    public function create($type, $options)
    {
        $block = new BlockEntity();
        $block->setId(uniqid());
        $block->setType($type);
        $block->setSettings($options);
        $block->setEnabled(true);
        $block->setCreatedAt(new \DateTime());
        $block->setUpdatedAt(new \DateTime());

        return $block;
    }

    /**
     * @param \AtCms\Entity\Block $block
     */
    public function getTypeService(BlockEntity $block)
    {
        $type = $block->getType();
        return $this->serviceManager->get($type);
    }
}