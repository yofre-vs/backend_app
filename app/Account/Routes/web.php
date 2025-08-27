<?php
/* 
 *  IMPORTANT:  Este archivo es cargado automáticamente desde RouteServiceProvider
 */


use Illuminate\Support\Facades\Route;
use App\Account\Controllers\AccountDashboardCtr;
use App\Domains\Account\Providers\CheckDomainAccess;
//dd(app(CheckDomainAccess::class));
Route::get('/account', function () {
    return redirect('/account/Dashboard');
});



Route::middleware(['auth', 'workspace.useraccess:account'])
    ->group(function () {
        Route::get('/account/dashboard', [AccountDashboardCtr::class, 'index']);
    });

