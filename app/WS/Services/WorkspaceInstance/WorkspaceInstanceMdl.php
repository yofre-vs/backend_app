<?php

namespace App\WS\Services\WorkspaceInstance;

use Illuminate\Database\Eloquent\Model;

class WorkspaceInstanceMdl extends Model
{
    protected $table = 'account_workspaces'; // Nombre exacto de la tabla
    protected $primaryKey = 'workspace_id'; // Tu clave primaria personalizada

    // Opcional: si tu tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Opcional: define los campos que puedes asignar masivamente
    protected $fillable = [
        'workspace_options_dinamics', 
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
