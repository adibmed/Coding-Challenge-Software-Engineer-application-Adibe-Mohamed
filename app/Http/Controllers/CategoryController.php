<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $category;

    /**
     * categoryController constructor.
     *
     * @param CategoryRepository $category
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * List all categorys.
     *
     * @return mixed
     */
    public function index()
    {
        return $this->category->all();
    }
}
