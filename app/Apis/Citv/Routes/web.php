<?php
/* 
 *  IMPORTANT:  Este archivo es cargado automáticamente desde RouteServiceProvider
 */


use Illuminate\Support\Facades\Route;
use App\Apis\Citv\Controllers\ApiInspectionsCtr;

//Route::middleware(['auth', 'workspace.useraccess:account', 'workspace.instance'])
Route::middleware([])
    ->group(function () {
         
        Route::get  ('/api/citv/inspections', [ApiInspectionsCtr::class, 'index']);
        Route::post ('/api/citv/inspections', [ApiInspectionsCtr::class, 'create']);
        
        Route::get('/api/citv/inspections/{id}', [ApiInspectionsCtr::class, 'get']);
        Route::patch('/api/citv/inspections/{id}', [ApiInspectionsCtr::class, 'update']);
        Route::delete('/api/citv/inspections/{id}', [ApiInspectionsCtr::class, 'delete']);
       // Route::get('/citv/{facility_uuid}/daily-inspections', [DailyTasksCtr::class, 'index']) ->whereUuid('facility_uuid');
       // Route::post('/citv/{facility_uuid}/daily-inspections', [DailyTasksCtr::class, 'actions']) ->whereUuid('facility_uuid');
        
    });
 
