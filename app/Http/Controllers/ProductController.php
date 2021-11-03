<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Services\Product as ProductService;

class ProductController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @param Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->_request  = $request;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductService $producService)
    {
        return $producService->get(
            [
                'filter' => request()->filter,
                'sort' => request()->sort
            ],
            request()->has('filter'),
            request()->has('sort'),
            request()->filled('filter'),
            request()->filled('sort')

        );
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductService $producService)
    {
        $validator = $producService->validator($this->_request->all());


        if (!$validator->fails()) {

            $producService->create($this->_request->all());

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
    public function destroy(ProductService $producService)
    {
        return $producService->delete(request()->id);
    }
}
