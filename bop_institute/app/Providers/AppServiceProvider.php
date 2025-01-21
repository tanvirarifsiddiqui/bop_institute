<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
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
        // Pass categories to the sidebar view
        View::composer('layouts.left_nav', function ($view) {
            $categories = Category::with('formulas')->get();
            $view->with('categories', $categories);
        });
    }
}
