<?php


namespace App\Account\Models;
use Illuminate\Database\Eloquent\Model;

use App\Account\Models\AccountWorkspaceUsersMdl;

class AccountWorkspacesMdl extends Model
{
    protected $table = 'account_workspaces'; // Nombre exacto de la tabla
    protected $primaryKey = 'workspace_id'; // Tu clave primaria personalizada
    
    public function users()
    {
        return $this->hasMany(AccountWorkspaceUsersMdl::class, 'workspace_id');
    }
}
