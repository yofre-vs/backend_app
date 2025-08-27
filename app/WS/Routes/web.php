<?php
/* 
 *  IMPORTANT:  Este archivo es cargado automáticamente desde RouteServiceProvider
 */


use Illuminate\Support\Facades\Route;
use App\WS\Http\Controllers\WSController;

Route::redirect('/login', '/auth/login');
Route::middleware(['auth', 'workspace.useraccess:account', 'workspace.instance'])
    ->group(function () {
        Route::get('/w/{uuid}', [WSController::class, 'index']);
    });

    /*Route::get('/citv/test-soap', function () {
    return \App\Domains\Citv\Helpers\MTCTokenHelper::requestToken([
        'codEntidad' => 'EC000222',
        'codIV' => '9-AA023FK78+ST6Y6JLT',
        'codLocal' => 'L000606',
    ]);
});*/
