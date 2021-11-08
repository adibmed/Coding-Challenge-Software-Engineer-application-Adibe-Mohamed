<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function all();

    public function save($data);

    public function findById($productId);

    public function findByName($productName);

    public function update($productId);

    public function delete($productId);
}
