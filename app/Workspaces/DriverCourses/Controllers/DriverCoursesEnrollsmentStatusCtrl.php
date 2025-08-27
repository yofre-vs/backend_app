<?php
namespace App\Workspaces\DriverCourses\Controllers;

use Illuminate\Http\Request;
use App\Workspaces\DriverCourses\Models\EnrollmentMdl;

class DriverCoursesEnrollsmentStatusCtrl
{
    public function handler(Request $request)
    {  $action_task = $request->action_task;
        switch( $action_task ){
            case "matricular": return self::toEnroll(  $request ); break;
            case "completar": return self::toComplete(  $request ); break;
            case "certificar": return self::toCertificate(  $request ); break;
            case "enviar": return self::toSubmit(  $request ); break;
            case "cerrar": return self::toClose(  $request ); break; 
        }
    }
    public function toEnroll(Request $request)
    {   
        $enrollment = EnrollmentMdl::find($request->e_enroll_id);
         
            if ($enrollment) { 
                $data= ([
                                'enroll_status' =>  'matriculado', 
                                'enroll_enrolled_date' =>  $request->e_enrolled_date, 
                                'enroll_snc_enroll_code' =>  $request->e_enrolled_code ]);
                                //dd ($data);
                $enrollment->update($data);  
            }
            //dd($enrollmentData);
            // Obtener los datos actuales del modelo como array
            $enrollmentData = $enrollment ? $enrollment->toFrontend() : [];
            //dd($enrollmentData);
            // Añadir campo adicional
            $responseData = array_merge($enrollmentData, ['action_task' => 'matricular']);

            return response()->json([
                'success' => true,
                'message' => 'Enrrollment compleate.',
                'data' => $responseData
            ]);
    }
    public function toComplete(Request $request)
    {   
        $enrollment = EnrollmentMdl::find($request->e_enroll_id);
            if ($enrollment) { 
                $data= ([
                                'enroll_status' =>  'completado',   ]);
                                //dd ($data);
                $enrollment->update($data);  
            }
            // Obtener los datos actuales del modelo como array
            $enrollmentData = $enrollment ? $enrollment->toFrontend() : [];
            // Añadir campo adicional
            $responseData = array_merge($enrollmentData, ['action_task' => 'completar']);
            return response()->json([
                'success' => true,
                'message' => 'Asistencia compleate.',
                'data' => $responseData
            ]);
    }

     
    public function toCertificate(Request $request)
    {   
        $enrollment = EnrollmentMdl::find($request->e_enroll_id);
            if ($enrollment) { 
                $data= ([ 'enroll_status' =>  'certificado', 
                                'enroll_enrolled_date' =>  $request->e_certified_date, 
                                'enroll_snc_enroll_code' =>  $request->e_certified_code]); 
                $enrollment->update($data);  
            }
            // Obtener los datos actuales del modelo como array
            $enrollmentData = $enrollment ? $enrollment->toFrontend() : [];
            // Añadir campo adicional
            $responseData = array_merge($enrollmentData, ['action_task' => 'certificar']);
            return response()->json([
                'success' => true,
                'message' => 'Asistencia compleate.',
                'data' => $responseData
            ]);
    }

    public function toSubmit(Request $request)
    {   
        $enrollment = EnrollmentMdl::find($request->e_enroll_id);
            if ($enrollment) { 
                $data= ([ 'enroll_status' =>  'enviado', 
                                'enroll_submitted_date' =>  $request->e_submited_date, 
                                'enroll_snc_submit_code' =>  $request->e_submited_code]); 
                $enrollment->update($data);  
            }
            // Obtener los datos actuales del modelo como array
            $enrollmentData = $enrollment ? $enrollment->toFrontend() : [];
            // Añadir campo adicional
            $responseData = array_merge($enrollmentData, ['action_task' => 'enviar']);
            return response()->json([
                'success' => true,
                'message' => 'Asistencia compleate.',
                'data' => $responseData
            ]);
    }
    public function toClose(Request $request)
    {   
        $enrollment = EnrollmentMdl::find($request->e_enroll_id);
            if ($enrollment) { 
                $data= ([ 'enroll_status' =>  'cerrado']); 
                $enrollment->update($data);  
            }
            // Obtener los datos actuales del modelo como array
            $enrollmentData = $enrollment ? $enrollment->toFrontend() : [];
            // Añadir campo adicional
            $responseData = array_merge($enrollmentData, ['action_task' => 'cerrar']);
            return response()->json([
                'success' => true,
                'message' => 'Asistencia compleate.',
                'data' => $responseData
            ]);
    }
     
 
     
 
}
