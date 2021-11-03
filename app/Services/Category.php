<?php

namespace App\Services;

use App\Models\Category as CategoryModel;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class Category
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        return CategoryModel::all();
    }


    /**
     * Create a new Category instance after a valid form.
     *
     * @param  array $data
     * @return CategoryModel
     */
    public function create(array $data)
    {
    }

    /**
     * Delete a resource model
     * 
     * @param  int $id
     * @return bool
     */

    public function delete($id)
    {
    }


    /**
     * Get a validator for a Category.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function validator(array $data)
    {
    }
}
