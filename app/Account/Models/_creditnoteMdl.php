<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditNote extends Model
{
    protected $table = 'citv_creditnotes'; // Nombre exacto de la tabla
    protected $primaryKey = 'invoice_id'; // Tu clave primaria personalizada

    // Opcional: si tu tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Opcional: define los campos que puedes asignar masivamente
    protected $fillable = [
        
        d
    ];



}
