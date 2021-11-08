<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Exception;

class CategoryController extends Controller
{
    protected $category;



    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->categoryService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
