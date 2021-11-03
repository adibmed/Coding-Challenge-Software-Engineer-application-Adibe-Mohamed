<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class Product
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get(array $data, bool $hasFilter, bool $hasSort, bool $filerExists = true, $sortExists = true)
    {
        if ($hasFilter && $filerExists)
            $category_id = Category::where('name', $data['filter'])->first()->id;

        // do filter and sort
        if ($hasSort && $sortExists && $hasFilter && $filerExists) {
            return ProductModel::whereRelation('categories', 'category_id', $category_id)->orderBy($data['sort'])->paginate(6);
        }
        // do only filter
        else if ($hasFilter && $filerExists) {
            return ProductModel::whereRelation('categories', 'category_id', $category_id)->paginate(6);
        }
        // do only sort
        else if ($hasSort && $sortExists) {
            return ProductModel::orderBy($data['sort'])->paginate(6);
        }
        // on return in random order
        else return ProductModel::inRandomOrder()->paginate(6);
    }


    /**
     * Create a new Product instance after a valid form.
     *
     * @param  array $data
     * @return ProductModel
     */
    public function create(array $data)
    {
        $product = new ProductModel([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'image' => $data['image']
        ]);

        $product->save();
        $product->categories()->attach($data['categories']);

        return $product;
    }

    /**
     * Delete a resource model
     * 
     * @param  int $id
     * @return bool
     */

    public function delete($id)
    {
        return ProductModel::find($id)->delete();
    }


    /**
     * Get a validator for a Product.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

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
