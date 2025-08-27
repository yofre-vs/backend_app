<?php namespace App\WS\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class WorkspaceRouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        $this->mapWebRoutes();
        $this->mapModuleRoutes();
    }

    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/web.php'));
    }

    public function mapModuleRoutes(): void
    {
        //Authentication
        Route::middleware(['web'])
                ->namespace("App\\Authentication\\Controllers")
                ->group(base_path('App\\Authentication\\Routes\web.php')); 
        
        //Account
        Route::middleware(['web'])
                ->namespace("App\\Account\\Controllers")
                ->group(base_path('App\\Account\\Routes\web.php')); 


        //WS      
        Route::middleware(['web'])
                ->namespace("App\\WS\\Controllers")
                ->group(base_path('App\\WS\\Routes\web.php')); 

        //Workspaces
        $modules = scandir(app_path('Workspaces'));

        foreach ($modules as $module) {
            if ($module === '.' || $module === '..') 
                continue;

            $routePath = app_path("Workspaces/{$module}/Routes/web.php");
 
            if (!file_exists($routePath))
                continue;
        
           Route::middleware(['web'])
            ->namespace('App\\Workspaces\\' . $module . '\\Controllers')
            ->group(base_path('App/Workspaces/' . $module . '/Routes/web.php'));
        }

        //Api
         $modules = scandir(app_path('Apis'));

        foreach ($modules as $module) {
            if ($module === '.' || $module === '..') 
                continue;

            $routePath = app_path("Apis/{$module}/Routes/web.php");
 
            if (!file_exists($routePath))
                continue;
        
           Route::middleware([])
            ->namespace('App\\Apis\\' . $module . '\\Controllers')
            ->group(base_path('App/Apis/' . $module . '/Routes/web.php')); 
        }
        
    }
}
