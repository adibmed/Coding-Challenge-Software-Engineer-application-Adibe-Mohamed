<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    /**
     * Get's a Category by it's ID
     *
     * @param int
     */
    public function get($category_id);

    /**
     * Get's all Categorys.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a Category.
     *
     * @param int
     */
    public function delete($category_id);

    /**
     * Updates a Category.
     *
     * @param int
     * @param array
     */
    public function update($category_id, array $category_data);
}
