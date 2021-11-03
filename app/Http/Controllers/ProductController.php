<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('filter') && request()->filled('filter'))
            $category_id = Category::where('name', request()->filter)->first()->id;

        // do filter and sort
        if (request()->has('sort') && request()->filled('sort') && request()->has('filter') && request()->filled('filter')) {
            return Product::whereRelation('categories', 'category_id', $category_id)->orderBy(request()->sort)->paginate(6);
        }
        // do only filter
        else if (request()->has('filter') && request()->filled('filter')) {
            return Product::whereRelation('categories', 'category_id', $category_id)->paginate(6);
        }
        // do only sort
        else if (request()->has('sort') && request()->filled('sort')) {
            return Product::orderBy(request()->sort)->paginate(6);
        }
        // on return in random order
        else return Product::inRandomOrder()->paginate(6);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "name" => "required|min:1|max:255",
            "description" => "required|min:0|max:255",
            "price" => "required|numeric|min:0|max:10000",
            "image" => "required|min:0|max:255",
            "categories" => "required|array|min:3"
        ];


        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()) {

            $product = new Product([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'image' => $request->input('image')
            ]);

            $product->save();
            $product->categories()->attach($request->input('categories'));

            return response('product successfully added!', 200);
        }

        return response('something went wrong', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
