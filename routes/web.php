<?php

use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/* IMPORTANTE -- by {autor}
*   Las Rutas de Domains(modulos) se cargan desde RouteServiceProvider (NO desde aquí).
*   Agregá rutas específicas en: app/Domains/<Modulo>/Routes/web.php
*       ej: Route::get('/citv/inwork', [inWorkCtr::class, 'index']);
*/


/*
use App\Http\Controllers\Citv\InspectionCenterController;
use App\Http\Controllers\Citv\InspectionsController;

Route::get('/citv',  [InspectionCenterController::class, 'index']);

Route::post('/citv/inspection-center/create', [InspectionCenterController::class, 'create']);
Route::get('/citv/inspection-center/edit/{id}', [InspectionCenterController::class, 'edit']);
Route::post('/citv/inspection-center/modify', [InspectionCenterController::class, 'modify']);
Route::get('/citv/inspection-center/invoice/{id}', [InspectionCenterController::class, 'invoice']);
Route::get('/citv/inspection-center/invoiceview/{id}', [InspectionCenterController::class, 'invoiceview']);
Route::post('/citv/inspection-center/invoicegenerate', [InspectionCenterController::class, 'invoicegenerate']);


Route::get('/citv/inspections', [InspectionsController::class, 'index']);
Route::get('/citv/inspections/creditnoteform/{id}', [InspectionsController::class, 'creditnoteform']);

Route::get('/citv/inspections/creditnotegenerate/', [InspectionsController::class, 'creditnotegenerate']);*/
