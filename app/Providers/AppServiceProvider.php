<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

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
        //
        View::composer('components.customer_view.weltopbar', function ($view) {
            $categories = Category::select('category_name', 'category_detail_name', 'category_id')->get();
            $groupedCategories = $categories->groupBy('category_name');
            $view->with('groupedCategories', $groupedCategories);
        });
    }
}
