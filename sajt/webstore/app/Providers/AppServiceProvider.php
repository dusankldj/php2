<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('components.component-aside-menu', function ($view) {
            $categories = Category::whereNull('parent_id')
                ->with('children')
                ->get();

            $view->with('categories', $categories);
        });
    }
}
