<?php

namespace App\QueryFilters;

use Closure;

class Category extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->whereRelation('categories', 'category_id', request($this->filterName()));
    }
}
