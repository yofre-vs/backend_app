<?php
/* 
 *  IMPORTANT:  Este archivo es cargado automáticamente desde RouteServiceProvider
 */


use Illuminate\Support\Facades\Route;
use App\Workspaces\DriverCourses\Controllers\DriverCoursesCtrl;
use App\Workspaces\DriverCourses\Controllers\DriverCoursesEnrollmentsCtrl;


Route::middleware(['auth', 'workspace.useraccess:account' , 'workspace.instance'])
    ->group(function () {
        
        Route::get ('/w/{uuid}/driver-courses', [DriverCoursesCtrl::class, 'index']) ->whereUuid('uuid');
        Route::post('/w/{uuid}/driver-courses', [DriverCoursesCtrl::class, 'actions']) ->whereUuid('uuid');
        Route::get ('/w/{uuid}/driver-courses/small-detail/{id}', [DriverCoursesCtrl::class, 'ajaxDetail'])->whereUuid('uuid');
        Route::Post ('/w/{uuid}/driver-courses/small-detail/{id}', [DriverCoursesEnrollmentsCtrl::class, 'update'])->whereUuid('uuid');
        Route::delete ('/w/{uuid}/driver-courses/small-detail/{id}', [DriverCoursesEnrollmentsCtrl::class, 'destroy'])->whereUuid('uuid');
        
    });

    