<?php
namespace App\WS\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class WorkspaceUser extends Authenticatable
{
    protected $table = 'account_users';

    public function getAuthIdentifierName()
    {
        return 'username';
    }   
    /*public function roles()
    {
        return $this->belongsToMany(PermRole::class, 'account_user_roles', 'user_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(PermPermission::class, 'account_user_permissions', 'user_id', 'permission_id');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'account_user_facilities', 'user_id', 'facility_id');
    }

    /**
     * Retorna la cantidad de accesos activos que tiene el usuario para un módulo (domain_code).
     *
     * @param string $moduleCode
     * @return int
     */
    /*public function getAccessCountToModule(string $moduleCode): int
    {
        return WorkspaceUserDomainAccess::where('user_id', $this->id)
            ->where('domain_code', $moduleCode)
            ->where('has_access', true)
            ->groupBy('user_id', 'domain_code')
            ->count();
    }

    /**
     * Retorna la colección de registros de acceso activos para un módulo (domain_code).
     *
     * @param string $moduleCode
     * @return Collection
     */
    /*public function getAccessRecordsToModule(string $moduleCode): Collection
    {
        return WorkspaceUserDomainAccess::where('user_id', $this->id)
            ->where('domain_code', $moduleCode)
            ->where('has_access', true)
            ->groupBy('user_id', 'domain_code')
            ->get();
    }*/
}
