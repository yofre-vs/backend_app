<?php

namespace App\Domains\Citv\Models;

use Illuminate\Database\Eloquent\Model;

class InspectionMdl extends Model
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
        'invoice_numeration'];

       /* inspection_id Primaria	int(10)		UNSIGNED	No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	
	2	inspection_class	varchar(100)	utf8mb4_unicode_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
	3	inspection_subclass	varchar(100)	utf8mb4_unicode_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
	4	inspection_service	varchar(100)	utf8mb4_unicode_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
	5	inspection_notes	text	utf8mb4_unicode_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
	6	inspection_certificade	varchar(50)	utf8mb4_unicode_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
	7	inspection_status	varchar(20)	utf8mb4_unicode_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
	8	inspection_metadata	longtext	utf8mb4_bin		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
	9	inspection_date	date			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
	10	inspection_created	datetime			No	current_timestamp()			Cambiar Cambiar	Eliminar Eliminar	
	11	inspection_updated	datetime			No	current_timestamp()			Cambiar Cambiar	Eliminar Eliminar	
	12	vehicle_id	int(11)			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
	13	vehicle_plate_license	varchar(50)	utf8mb4_unicode_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
	14	vehicle_make	varchar(50)	utf8mb4_unicode_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
	15	vehicle_model	varchar(50)	utf8mb4_unicode_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
	16	driver_id	int(11)			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
	17	facility_id	int(11)			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
	18	invoice_id	int(11)			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
	19	invoice_extra	text	utf8mb4_unicode_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
	20	user_id
    ];
*/
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

}
