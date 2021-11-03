<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\CategoryRepositoryInterface',
            'App\Repositories\CategoryRepository'
        );
    }
}
