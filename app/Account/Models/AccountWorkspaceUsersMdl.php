<?php

namespace App\Account\Models;

use Illuminate\Database\Eloquent\Model;
use App\Account\Models\AccountWorkspacesMdl;

class AccountWorkspaceUsersMdl extends Model
{
    protected $table = 'account_workspace_users'; // Nombre exacto de la tabla
    protected $primaryKey = 'id'; // Tu clave primaria personalizada
    
    public function workspace()
    {
        return $this->belongsTo(AccountWorkspacesMdl::class, 'workspace_id');
    }
}
