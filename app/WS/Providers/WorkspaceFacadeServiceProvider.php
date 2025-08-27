<?php

namespace App\WS\Providers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\AliasLoader;
use App\WS\Services\WorkspaceService;
use App\WS\Services\WorkspaceInstance\WorkspaceInstanceContext; 

class WorkspaceFacadeServiceProvider extends ServiceProvider
{
    public function boot(): void
    { 
    }

    public function register(): void
    {
            // Registrar alias (facade) para Core
    $loader = AliasLoader::getInstance();
    $loader->alias('Workspace', \App\WS\Facades\Workspace::class);
        // Contextos individuales
        $this->app->singleton(WorkspaceInstanceContext::class, fn () => new WorkspaceInstanceContext()); 
        // Servicio Core que orquesta los anteriores
        $this->app->singleton('Workspace', function ($app) {
            return new WorkspaceService(
                $app->make(WorkspaceInstanceContext::class)
                //$app->make(CompanyContext::class),
                //$app->make(VehicleContext::class)
            );
        });
        
 
    }
    
}
