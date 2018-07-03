<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are ms assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function channels()
    {
        return $this->hasMany('App\Models\Channel', 'user_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    /**
     * Check one role
     * @param string $role
     * @return boool
     */
    public function hasRole($role) 
    {
        return $this->with('roles')->where('name', $role)->first() !== null;
    }

    /**
     * Check multiple roles
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        return  $this->with('roles')->whereIn('name', $roles)->first() !== null;
    }

    /**
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles);
             
        }
        return $this->hasRole($roles);
    }
   

   public function hasPermissionOfUser($permissions)
   {
        foreach ($this->roles as $role) {
            if ($role->authorizePermissions($permissions)) {
                return true;
            }
        }
        return false;
   }
}
