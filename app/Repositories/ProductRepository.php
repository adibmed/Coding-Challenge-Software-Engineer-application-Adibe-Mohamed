<?php

namespace App\Repositories;


use App\Models\Product;
use Illuminate\Pipeline\Pipeline;

class ProductRepository implements ProductRepositoryInterface
{


    public function all()
    {

        return app(Pipeline::class)
            ->send(Product::query())
            ->through([
                \App\QueryFilters\Category::class,
                \App\QueryFilters\Sort::class
            ])
            ->thenReturn()
            ->paginate(5);
    }


    public function save($data)
    {
        $product = new Product();

        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->image = $data['image'];

        $product->save();

        $product->categories()->attach($data['categories']);

        return $product->fresh();
    }


    public function findById($productId)
    {
    }

    public function findByName($productName)
    {
    }

    public function update($productId)
    {
    }

    public function delete($productId)
    {
    }
}
