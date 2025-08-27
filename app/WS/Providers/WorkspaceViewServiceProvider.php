<?php

namespace App\WS\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class WorkspaceViewServiceProvider extends ServiceProvider
{

    public function boot(): void
    {   
        //Authentication Views
        View::addNamespace("authentication", app_path("Authentication/Views")  );

        //Account Views
        View::addNamespace("account",  app_path("Account/Views") );

        //Workspaces Views
        $modules = scandir(app_path('Workspaces'));

        foreach ($modules as $module) {
            if ($module === '.' || $module === '..') {
                continue;
            }

            $viewPath = app_path("Workspaces/{$module}/Views");

            if (is_dir($viewPath)) {
                $namespace = strtolower($module);
                if ($module === 'Workspace') {
                    $namespace = 'ws';
                }
                View::addNamespace($namespace, $viewPath);
            }
        }

        //Account Views
        View::addNamespace("ws",  app_path("WS/Views") );

    }



    public function register(): void
    {
        //
    }
}
