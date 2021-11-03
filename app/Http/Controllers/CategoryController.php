<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Category as CategoryService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryService $categoryService)
    {
        return $categoryService->get();
    }
}
