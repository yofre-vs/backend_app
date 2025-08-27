<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'citv_invoices'; // Nombre exacto de la tabla
    protected $primaryKey = 'invoice_id'; // Tu clave primaria personalizada

    // Opcional: si tu tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Opcional: define los campos que puedes asignar masivamente
    protected $fillable = [
        
        'invoice_id', 
        'plant_id',        
        'plant_name', 
        'plant_ruc', 
        'invoice_client_document_type',
        'invoice_client_document_number',
        'invoice_client_name', 
        'invoice_certificate', 
        'invoice_service',
        'invoice_class', 
        'invoice_amount_total', 
        'invoice_amount_igv',
        'invoice_type',  
        'invoice_number',
        'invoice_sunat_response', 
        'invoice_sunat_xml', 
        'invoce_creditnote_id', 

        'invoice_metadata', 
        //'invoice_created',
        'invoice_sended'
    ];



}
