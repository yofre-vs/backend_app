<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    protected $table = 'citv_inspections'; // Nombre exacto de la tabla
    protected $primaryKey = 'inspection_id'; // Tu clave primaria personalizada

    // Opcional: si tu tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Opcional: define los campos que puedes asignar masivamente
    protected $fillable = [
        'inspection_id', 
        'inspection_date', 
        'inspection_class',
        'inspection_service', 
        'inspection_note', 
        'inspection_certification',        
        'inspection_status', 
        'vehicle_id', 
        'vehicle_license_plate',
        'vehicle_make',  
        'vehicle_model',
        'driver_id', 
        'driver_license_number', 
        'driver_fullname', 

        'plant_id', 
        'plant_name',
        'plant_ruc', 
        'invoice_id', 
        'invoice_amount',        
        'inspection_status', 
        'invoice_status', 
        'invoice_type',
        'invoice_numeration'
    ];

}
