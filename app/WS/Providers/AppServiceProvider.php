<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $modules = scandir(app_path('Domains'));

        foreach ($modules as $module) {
            if ($module === '.' || $module === '..') {
                continue;
            }

            $viewPath = app_path("Domains/{$module}/Views");

            if (is_dir($viewPath)) {
              //  dd($module."--".$viewPath);
                View::addNamespace(strtolower($module), $viewPath);
            }
        }
    }


    public function register(): void
    {
        //
    }
}
