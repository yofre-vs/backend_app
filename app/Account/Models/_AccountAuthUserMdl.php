<?php namespace App\Domains\Account\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class AccountAuthUserMdl extends Authenticatable
{
    protected $table = 'account_users';

    public function roles()
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

    
    public function hasPermission(string $slug): bool
    {
        // Asume que tienes una relación roles y permisos
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('slug', $slug)) {
                return true;
            }
        }
        // También podrías tener permisos asignados directamente al usuario
        if ($this->permissions->contains('slug', $slug)) {
            return true;
        }

        return false;
    }

}

class PermRole extends Model
{
    protected $table = 'account_perm_roles';

    public function permissions()
    {
        return $this->belongsToMany(PermPermission::class, 'account_perm_role_permissions', 'role_id', 'permission_id');
    }
}

class PermPermission extends Model
{
    protected $table = 'account_perm_permissions';
}

class Facility extends Model
{
    protected $table = 'global_facility'; // o base_facilities si usas prefijo

    public function users()
    {
        return $this->belongsToMany(AccountUser::class, 'account_user_facilities', 'facility_id', 'user_id');
    }
}

class Subscription extends Model
{
    protected $table = 'account_subscriptions';

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'account_subscription_modules', 'subscription_id', 'module_id');
    }
}
