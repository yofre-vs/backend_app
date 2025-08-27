<?php 
 

namespace App\Account\Providers;

use Closure;
use Illuminate\Http\Request;

class CheckDomainAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Ejemplo básico de lógica
        if ($request->getHost() !== '127.0.0.1') {
            abort(403, 'Dominio no autorizado.');
        }

        return $next($request);
    }
}

