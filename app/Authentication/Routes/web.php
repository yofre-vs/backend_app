<?php
/* 
 *  IMPORTANT:  Este archivo es cargado automáticamente desde RouteServiceProvider
 */

use Illuminate\Support\Facades\Route;
use App\Authentication\Controllers\AuthCtr;


Route::redirect('/', '/auth/login');
Route::redirect('/auth', '/auth/login'); 
Route::middleware('web')->prefix('auth')->group(function () {
    // Mostrar formulario de login
    Route::get('/login', [AuthCtr::class, 'showLoginForm'])->name('login'); 
    Route::post('/login', [AuthCtr::class, 'login']) ;

    // Logout (requiere estar autenticado)
    Route::post('/logout', [AuthCtr::class, 'logout'])->name('logout') ;
});