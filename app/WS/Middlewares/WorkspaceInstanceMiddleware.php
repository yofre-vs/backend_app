<?php

namespace App\WS\Middlewares;

use Closure;
use Illuminate\Http\Request;
use App\WS\Services\WorkspaceInstance\WorkspaceInstanceMdl;

class WorkspaceInstanceMiddleware
{
    protected WorkspaceInstanceMdl $facilityModel;

    public function __construct(WorkspaceInstanceMdl $facilityModel)
    {
        $this->facilityModel = $facilityModel;
    }

    public function handle(Request $request, Closure $next, ?string $module = null)
    {   
        $Uuid = $request->route('uuid');
        
        //dd($Uuid);
        $instance = \Workspace::instance(  $Uuid  );  
        //dd($Uuid);
        
        if (!$instance) { 
            abort(404, 'instance no encontrada');
        }

        return $next($request);
    }
}
