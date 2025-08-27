<?php

namespace App\WS\Providers;

use Illuminate\Support\ServiceProvider; 
use Illuminate\Support\Facades\View;
use App\WS\Services\WorkspaceLayout\WSLayoutManager;

class WorkspaceLayoutServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Registra el singleton del WSLayoutManager
        $this->app->singleton(WSLayoutManager::class, function ($app) {
            return new WSLayoutManager();
        });
    }

    public function boot(): void
    {   
        // Obtenemos la instancia ya registrada
        $layout = app(WSLayoutManager::class);
 
        // Registramos el namespace personalizado para vistas
        //dd( __FILE__, $layout->viewPath());
        //View::addNamespace('wslayout', $layout->viewPath());
        // View::addNamespace('wslayout', 'D:\Sandbox\Projects\CITVproject\webapp\frontend\app\WS\Views\Layouts'); 
        // Compartimos globalmente las opciones con todas las vistas
        View::share('layoutOptions', $layout->all());

        // (Opcional) Log para verificar ruta cargada (puedes eliminar esto luego)
        logger()->info('WSLayout path registrado en View:', ['path' => $layout->viewPath()]);

    }



    
}
