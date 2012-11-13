<?php

namespace AtCms\Mapper;

interface PageInterface
{
    public function findById($id);

    public function findByIdentifier($identifier);

    public function insert($user);

    public function update($user);
}
