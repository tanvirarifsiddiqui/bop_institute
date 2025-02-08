<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Vite;
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
        //ensure build directory:
        // Adjust the build directory if running in production.
        if ($this->app->environment('production')) {
            Vite::useBuildDirectory('./build');
        }

        // Pass categories to the sidebar view
        View::composer('layouts.left_nav', function ($view) {
            $categories = Category::with('formulas')->get();
            $view->with('categories', $categories);
        });

    }
}
