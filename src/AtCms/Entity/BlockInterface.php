<?php

namespace AtCms\Entity;

/**
 *
 */
interface BlockInterface
{
    /**
     * @param $id
     * @return mixed
     */
    function setId($id);

    /**
     * @return mixed
     */
    function getId();

    /**
     * @param $name
     * @return mixed
     */
    function setName($name);

    /**
     * @return mixed
     */
    function getName();

    /**
     * @param $type
     * @return mixed
     */
    function setType($type);

    /**
     * @return mixed
     */
    function getType();

    /**
     * @param $enabled
     * @return mixed
     */
    function setEnabled($enabled);

    /**
     * @return mixed
     */
    function getEnabled();

    /**
     * @param \DateTime $createdAt
     * @return mixed
     */
    function setCreatedAt(\DateTime $createdAt = null);

    /**
     * @return mixed
     */
    function getCreatedAt();

    /**
     * @param \DateTime $updatedAt
     * @return mixed
     */
    function setUpdatedAt(\DateTime $updatedAt = null);

    /**
     * @return mixed
     */
    function getUpdatedAt();

    /**
     * Sets the block settings
     *
     * @param array $settings An array of key/value
     */
    function setSettings(array $settings = array());

    /**
     * Returns the block settings
     *
     * @return array $settings An array of key/value
     */
    function getSettings();

    /**
     * Add one child block
     *
     * @param BlockInterface $children
     */
    function addChildren(BlockInterface $children);

    /**
     * Returns child blocks
     */
    function getChildren();

    /**
     * Returns whether or not this block has children
     *
     * @return boolean
     */
    function hasChildren();

    /**
     * Set the parent block
     *
     * @param BlockInterface|null $parent
     */
    function setParent(BlockInterface $parent = null);

    /**
     * Returns the parent block
     *
     * @return BlockInterface $parent
     */
    function getParent();

    /**
     * Returns whether or not this block has a parent
     *
     * @return void
     */
    function hasParent();
}