<?php

namespace App\Workspaces\DriverCourses\Controllers;

use Illuminate\Http\Request;
use App\Workspaces\DriverCourses\Models\EnrollmentMdl;
 
class  DriverCoursesCtrl {

    public static function index( Request $request )
    {   $enrollment = EnrollmentMdl::where('facility_id', 1)
        ->orderBy('created_at', 'desc')->get();     
        return view('drivercourses::driver_courses',["enrollment"=> $enrollment ] );
    } 

    public static function actions( Request $request )
    {   //dd($_POST);
        switch($request->action){
            //New Enrroll
            case"new-enroll":  return (new DriverCoursesEnrollmentsCtrl)->Create($request);
                break;
            
            //Update Status
            case"save-status": return (new DriverCoursesEnrollsmentStatusCtrl)->handler($request);
                break;
            
            //Update Attendance
            case"save-attendance": return (new DriverCoursesEnrollmentsCtrl)->save_attendance($request);
                break;


            case"update-enroll": (new DriverCoursesEnrollsCtrl)->handleUpdate($request);
                break;
            case"update-attendance": 
                break;

                
        }
    }
    public static function ajaxDetail( string $uuid, int $id )
    {    
         $enrollment = EnrollmentMdl::find($id) ;  
         //dd(   $enrollment);
        
        return view('drivercourses::driver_courses-ajax-detail',["enrollment"=> $enrollment ] );
    } 
}