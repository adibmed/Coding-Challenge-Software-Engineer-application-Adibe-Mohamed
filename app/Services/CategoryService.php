<?php

namespace App\Services;

use App\Repositories\CategoryRepositoryInterface;

class CategoryService
{

    protected $categoryRepositoryInterface;

    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }

    public function getAll()
    {
        return $this->categoryRepositoryInterface->all();
    }
}
