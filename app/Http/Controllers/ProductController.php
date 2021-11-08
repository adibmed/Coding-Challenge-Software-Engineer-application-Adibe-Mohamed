<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Services\ProductService as ProductService;
use Exception;

class ProductController extends Controller
{


    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->productService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }


    public function store(Request  $request)
    {
        $data = $request->all();

        $result = ['status' => 200];

        try {
            $result['data'] = $this->productService->saveProductData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
