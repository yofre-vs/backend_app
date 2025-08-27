<?php

namespace App\Workspaces\Citv\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InspectionMdl extends Model
{
    protected $table = 'citv_inspections'; 
    protected $primaryKey = 'inspection_id';

    public $timestamps = true;


    protected $fillable = [
        'inspection_id', 
        'inspection_date', 
        'inspection_class',
        'inspection_subclass', 
        'inspection_service', 
        'inspection_area',        
        'inspection_status', 
        'vehicle_id', 
        'vehicle_plate',
        'vehicle_make',  
        'vehicle_model',
        'driver_id', 
        
        'driver_fullname', 

        'facility_id', 
        
        'invoice_id', 
        'invoice_amount',        
        'inspection_status', 
        'invoice_status', 
        'invoice_type',
        'invoice_numeration'];

       
     
}
