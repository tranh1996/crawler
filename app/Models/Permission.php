<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

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

    public function roles() 
    {
        return $this->belongsToMany(Role::class, 'permission_roles');
    }

}
