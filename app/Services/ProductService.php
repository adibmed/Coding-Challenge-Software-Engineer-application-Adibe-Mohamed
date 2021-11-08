<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use InvalidArgumentException;

class ProductService
{

    protected $productRepositoryInterface;

    public function __construct(ProductRepositoryInterface $productRepositoryInterface)
    {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }

    public function getAll()
    {
        return $this->productRepositoryInterface->all();
    }

    public function saveProductData($data)
    {
        $validator = $this->validator($data);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->productRepositoryInterface->save($data);
    }


    public function validator(array $data)
    {

        $rules = [
            "name" => "required|min:1|max:255",
            "description" => "required|min:0|max:255",
            "price" => "required|numeric|min:0|max:10000",
            "image" => "required|min:0|max:255",
            "categories" => "required|array|min:3"
        ];

        return FacadesValidator::make($data, $rules);
    }
}
