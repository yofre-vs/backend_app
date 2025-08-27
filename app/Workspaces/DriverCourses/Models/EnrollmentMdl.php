<?php

namespace App\Workspaces\DriverCourses\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollmentMdl extends Model
{
    protected $table = 'dschool_enrollments'; 
    protected $primaryKey = 'enroll_id';  
     

    // Opcional: si tu tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Opcional: define los campos que puedes asignar masivamente
    protected $fillable = [
        
        'enroll_id',
        'enroll_doc',
        'enroll_doc_type',
        'enroll_name',
        'enroll_lastname',
        'enroll_fullname',
        'enroll_course',
        'enroll_course_hours',
        'enroll_course_practice',
        'enroll_course_theory',
        'enroll_course_completed',
        
        'enroll_snc_enroll_code',        
        'enroll_snc_submit_code',        
        'enroll_snc_certificate_code',
        
        'enroll_payment',
        'enroll_payment_status',
        'enroll_status',
        'enroll_metadata',
        'enroll_tags',
        'enroll_enrolled_date',
        'enroll_last_attendance_date',
        'enroll_submitted_date',
        'enroll_certified_date',
        'enroll_obs',
        'enroll_created_at',
        'enroll_updated_at',
        'person_id',
        'facility_id',
        'invoice_id',
        'invoice_extra',
        'user_id'
    ];
    protected $casts = [
        'enroll_course_practice' => 'array',
        'enroll_course_theory' => 'array',
    ];

    // En EnrollmentMdl.php
    public function toFrontend()
    {
        return [
            'enroll_id' => $this->enroll_id,
            'enroll_doc' => $this->enroll_doc,
            'enroll_doc_type' => $this->enroll_doc_type,
            'enroll_name' => $this->enroll_name,
            'enroll_lastname' => $this->enroll_lastname,
            'enroll_fullname' => $this->enroll_fullname,
            'enroll_course' => $this->enroll_course,
            'enroll_course_hours' => $this->enroll_course_hours,
            'enroll_course_theory' => $this->enroll_course_theory,
            'enroll_course_practice' => $this->enroll_course_practice,
            'enroll_course_completed' => $this->enroll_course_completed,
            'enroll_snc_enroll_code' => $this->enroll_snc_enroll_code,
            'enroll_snc_submit_code' => $this->enroll_snc_submit_code,
            'enroll_snc_certificate_code' => $this->enroll_snc_certificate_code,
            'enroll_payment' => $this->enroll_payment,
            'enroll_payment_status' => $this->enroll_payment_status,
            'enroll_status' => $this->enroll_status,
            'enroll_metadata' => $this->enroll_metadata,
            'enroll_tags' => $this->enroll_tags,
            'enroll_enrolled_date' => $this->enroll_enrolled_date,
            'enroll_last_attendance_date' => $this->enroll_last_attendance_date,
            'enroll_submitted_date' => $this->enroll_submitted_date,
            'enroll_certified_date' => $this->enroll_certified_date,
            'observations' => $this->observations,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'person_id' => $this->person_id,
            'facility_id' => $this->facility_id,
            'invoice_id' => $this->invoice_id,
            'invoice_extra' => $this->invoice_extra,
            'user_id' => $this->user_id,
        ];
    }




}
