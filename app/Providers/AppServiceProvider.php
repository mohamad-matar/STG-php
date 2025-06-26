<?php

namespace App\Providers;

use App\Models\Admin\Setting;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFive();

        view()->composer(
            ['layouts.master'],
            function ($view) {
                $settings = Setting::all();
                foreach ($settings as $setting)
                    $components[$setting->key] = $setting->value;
                $view->with('components', $components);
            }
        );
    }
}
