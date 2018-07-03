<?php
namespace App\Repositories\Eloquents;

use App\Repositories\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function getList() 
    {
        return $this->model->lists('display_name','id');
    }

}