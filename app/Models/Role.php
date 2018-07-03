<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'create_at',
        'update_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }

    public function permissions() 
    {
        return $this->belongsToMany(Permission::class, 'permission_roles');
    }

     /**
     * Check one permission
     * @param string $permission
     * @return boool
     */
    public function hasPermission($permission) 
    {
        return $this->permissions()->where('name', $permission)->first() !== null;
    }

    /**
     * Check multiple permissions
     * @param array $permissions
     * @return bool
     */
    public function hasAnyPermissions($permissions)
    {
        return  $this->permissions()->whereIn('name', $permissions)->first() !== null;
    }

    /**
     * @param string|array $permissions
     */
    public function authorizePermissions($permissions)
    {
        if (is_array($permissions)) {
            return $this->hasAnyPermissions($permissions);
             
        }
        return $this->hasPermission($permissions);
    }

}

