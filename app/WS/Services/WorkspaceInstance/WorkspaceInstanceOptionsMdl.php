<?php

namespace App\WS\Services\CoreFacility;

use Illuminate\Database\Eloquent\Model;

class CoreFacilityOptionsMdl extends Model
{
    protected $table = 'account_facility_options'; // Nombre exacto de la tabla
    protected $primaryKey = 'option_id'; // Tu clave primaria personalizada

    // Opcional: si tu tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Opcional: define los campos que puedes asignar masivamente
    protected $fillable = [
        'option_id', 
    ];

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
