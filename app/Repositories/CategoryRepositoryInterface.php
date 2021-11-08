<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    
    public function all();

    public function save($data);

    public function findById($categoryId);

    public function findByName($categoryName);

    public function update($categoryId);

    public function delete($categoryId);
}
