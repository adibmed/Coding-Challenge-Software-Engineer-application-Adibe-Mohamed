<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{


    public function all()
    {
        return Category::all();
    }

    public function save($data)
    {
    }

    public function findById($categoryId)
    {
    }

    public function findByName($categoryName)
    {
    }

    public function update($categoryId)
    {
    }

    public function delete($categoryId)
    {
    }
}
