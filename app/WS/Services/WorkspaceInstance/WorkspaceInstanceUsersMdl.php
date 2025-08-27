<?php

namespace App\WS\Services\CoreFacility;

use Illuminate\Database\Eloquent\Model;

class CoreFacilityUsersMdl extends Model
{
    protected $table = 'account_user_facilities'; // Nombre exacto de la tabla
    protected $primaryKey = 'id'; // Tu clave primaria personalizada

    // Opcional: si tu tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Opcional: define los campos que puedes asignar masivamente
    protected $fillable = [
        'user_id', 
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
