<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CmsNavigationMenu;
use Illuminate\Support\Facades\View;

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
    View::composer('layouts.app', function ($view) {

        $mainMenu = CmsNavigationMenu::with([
            'items' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('sort_order');
            }
        ])
        ->where('location', 'header')
        ->where('is_active', true)
        ->first();

        $view->with('mainMenu', $mainMenu);

    });
}
}
