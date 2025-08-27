<?php
/* 
 *  IMPORTANT:  Este archivo es cargado automáticamente desde RouteServiceProvider
 */


use Illuminate\Support\Facades\Route;
use App\Workspaces\Citv\Controllers\InspectionsCtr;


Route::middleware(['auth', 'workspace.useraccess:account', 'workspace.instance'])
    ->group(function () {
        Route::get('/inspections', [InspectionsCtr::class, 'index']);
        Route::post('/inspections', [InspectionsCtr::class, 'actions']);
       // Route::get('/citv/{facility_uuid}/daily-inspections', [DailyTasksCtr::class, 'index']) ->whereUuid('facility_uuid');
       // Route::post('/citv/{facility_uuid}/daily-inspections', [DailyTasksCtr::class, 'actions']) ->whereUuid('facility_uuid');
        
    });

    /*Route::get('/citv/test-soap', function () {
    return \App\Domains\Citv\Helpers\MTCTokenHelper::requestToken([
        'codEntidad' => 'EC000222',
        'codIV' => '9-AA023FK78+ST6Y6JLT',
        'codLocal' => 'L000606',
    ]);
});*/
