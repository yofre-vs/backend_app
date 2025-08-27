<?php
namespace App\Workspaces\DriverCourses\Controllers;

use Illuminate\Http\Request;
use App\Workspaces\DriverCourses\Models\EnrollmentMdl;

class DriverCoursesEnrollmentsCtrl
{
    public function  Create(Request $request)
    {  
        try {
    $data = [
        'enroll_doc_type' =>  $request->e_doc_type,
        'enroll_doc' => $request->e_doc, 
        'enroll_fullname' =>  $request->e_fullname,
        'enroll_course' =>  $request->e_course,
        'enroll_course_hours' =>  100,
        'enroll_tags' =>  $request->e_tags,
        'enroll_obs' =>  $request->e_obs,
        'enroll_status' =>  'registrado',
        'facility_id' =>  1,
        'user_id' =>  1,
    ];
     
    $enroll = EnrollmentMdl::create($data); 
    return response()->json([
        'success' => true,
        'message' => 'Inscripción creada correctamente.',
        'data' => $enroll
    ]);
} catch (\Throwable $e) {
    return response()->json([
        'success' => false,
        'message' => 'Error al crear inscripción',
        'error' => $e->getMessage()
    ], 500);
}

        //return response()->json(['message' => 'Matriculado']);
    }

    public function  save_attendance(Request $request)
    {   $enrollment = EnrollmentMdl::find($request->enroll_id); 
         
            if ($enrollment) { 
                if($request->type == "p"){
                    $enroll_course_a =  $enrollment->enroll_course_practice;
                }else{
                    $enroll_course_a =  $enrollment->enroll_course_theory;
                }
                if($enroll_course_a==null  ){
                    $enroll_course_a = array('hours'=>$request->attendance_hours,
                                             'items'=>[ 
                                                "1"=> [ "d"=> $request->attendance_date, 
                                                        "h"=> $request->attendance_hours
                                                        ]]
                                        );
                }else{ 
                    if($request->order =="new"){ 
                        $order = count ($enroll_course_a['items'])+1;
                        $hours = $enroll_course_a['hours']+ $request->attendance_hours ;
                        $enroll_course_a['items'][$order]= array('d'=> $request->attendance_date,
                                                            'h' => $request->attendance_hours );
                    }else{
                        $hours = $enroll_course_a['hours'];
                        $hours = $hours - $enroll_course_a['items'][$request->order]['h'];
                        $hours = $hours + $request->attendance_hours;
                        $enroll_course_a['hours'] =  $hours;
                        $enroll_course_a['items'][$request->order]['d']= $request->attendance_date ;
                        $enroll_course_a['items'][$request->order]['h'] = $request->attendance_hours;
                    }
                }
                if($request->type == "p"){
                    $enrollment->enroll_course_practice = $enroll_course_a ;
                    //$data= ([ 'enroll_course_practice' =>  $enrollment->enroll_course_practice ]);
                }else{
                    $enrollment->enroll_course_theory = $enroll_course_a ;
                    //$data= ([ 'enroll_course_theory' =>  $enrollment->enroll_course_practice ]);
                }
               // dd($enroll_course_a);
                //dd($enrollment );
                
                $enrollment->update( );  
            } 
            return response()->json([
                'success' => true,
                'message' => 'Enrrollment compleate.',
                'data' => $enrollment 
            ]);
    }

    public function Update(Request $request)
    {
        $enrollment = EnrollmentMdl::find($request->id); 
        
        if ($enrollment) {
            $enrollment->enroll_doc_type = $request->e_doc_type ;
            $enrollment->enroll_doc  = $request->e_doc ;
            $enrollment->enroll_fullname = $request->e_fullname ;
            $enrollment->enroll_course = $request->e_course ;
            $enrollment->enroll_tags = $request->e_tags ;
            $enrollment->enroll_obs = $request->e_obs ;
            $enrollment->created_at = $request->e_created_at ;
            $enrollment->enroll_enrolled_date = $request->e_enrolled_date ;
            $enrollment->enroll_snc_enroll_code = $request->e_snc_enroll_code ;
            $enrollment->enroll_course_completed = $request->e_course_completed ;
            $enrollment->enroll_certified_date = $request->e_certified_date ;
            $enrollment->enroll_snc_certificate_code = $request->e_snc_certificate_code ;
            $enrollment->enroll_submitted_date = $request->e_submitted_date ;
            $enrollment->enroll_snc_submit_code = $request->e_snc_submit_code ;
            //For: $enrollment->enroll_course_practice 
                $total_pHours=0;
                foreach ( $request->e_phours as $reg ) {
                    if (!empty($reg ['h'])) {
                        $total_pHours += (int) $reg ['h'];
                    }
                }
                $practice = $enrollment->enroll_course_practice ?? [];
                $practice['hours'] = $total_pHours;
                $practice['items'] = $request->e_phours;
                $enrollment->enroll_course_practice  = $practice;
            
            //For: $enrollment->enroll_course_theory
                $total_tHours=0;
                foreach ( $request->e_thours as $reg ) {
                    if (!empty($reg ['h'])) {
                        $total_tHours += (int) $reg ['h'];
                    }
                }
                $theory = $enrollment->enroll_course_theory ?? [];
                $theory['hours'] = $total_tHours;
                $theory['items'] = $request->e_thours;
                $enrollment->enroll_course_theory  = $theory;

            $enrollment->enroll_course_hours = $total_tHours +  $total_pHours;
            
            $enrollment->enroll_payment = $request->e_payment ;
            $enrollment->save();
        }
        //dd( $request->all() );
        // Actualizar inscripción
        return response()->json([
            'success' => true,
            'message' => 'Actualizado correctamente.',
            'data' => $enrollment
        ]);
    }
    public function destroy( Request $request)
    {
       $enrollment = EnrollmentMdl::find($request->id);
       
        if (!$enrollment) {
            return response()->json(['error' => 'Orden  no encontrado'], 404);
        } 
        
        EnrollmentMdl::where('enroll_id', $request->id)->delete();
        $enrollment->delete();

        return response()->json(['success' => true]);
    }
}
