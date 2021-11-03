<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Get's a Category by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($category_id)
    {
        return Category::find($category_id);
    }

    /**
     * Get's all Categorys.
     *
     * @return mixed
     */
    public function all()
    {
        return Category::all();
    }

    /**
     * Deletes a Category.
     *
     * @param int
     */
    public function delete($category_id)
    {
        Category::destroy($category_id);
    }

    /**
     * Updates a Category.
     *
     * @param int
     * @param array
     */
    public function update($category_id, array $category_data)
    {
        Category::find($category_id)->update($category_data);
    }
}
