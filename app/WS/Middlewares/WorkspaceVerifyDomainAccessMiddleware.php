<?php

namespace App\WS\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WorkspaceVerifyDomainAccessMiddleware
{
    public function handle(Request $request, Closure $next, ?string $module = null)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('auth\login');
        }

        if (!$module) {
            Log::warning('Middleware CoreVerifyModuleAccess usado sin módulo.');
            abort(500, 'Falta el módulo a verificar.');
        }

/*
        // Cambiado aquí: comprobar si el método existe en base al nuevo nombre
        if (!method_exists($user, 'getAccessCountToModule')) {
            Log::error('El usuario no implementa getAccessCountToModule(). Clase: '.get_class($user));
            abort(500, 'Error de configuración del usuario: método getAccessCountToModule() no encontrado.');
        }
dd($module);
        // Verificar si tiene acceso basado en contar registros
        if ($user->getAccessCountToModule($module) <= 0) {
            Log::info("Acceso denegado al módulo '{$module}' para usuario ID {$user->id}.");
            abort(403, 'No tienes permiso para acceder a este módulo.');
        }*/
        return $next($request);
    }


}
