<?php
namespace App\WS\Http\Controllers;

use App\Workspaces\DriverCourses\Controllers\DriverCoursesCtrl;
use App\Workspaces\MedicalExams\Controllers\MedicalExamsCtrl;
use App\Workspaces\VehicleInspection\Controllers\VehicleInspectionCtrl; 

use Illuminate\Http\Request;

class WSController extends Controller
{
    public function index( Request $request  )
    {   
        $instance = \Workspace::instance();
        switch($instance->ws ){
            case "citv":     VehicleInspectionCtrl::index($request);
                break;
            case "esccond":  return DriverCoursesCtrl::index($request);
                break;
            case "ecsal":    MedicalExamsCtrl::index($request);
                break;
        }
        
    
        return $instance->ws ;/*$inspections = Inspection::all();
        return view('citv/inspection_center/inspection_center', ['inspections'=> $inspections]);*/
    }

    
}