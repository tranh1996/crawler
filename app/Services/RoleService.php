<?php
namespace App\Services;

use App\Repositories\RoleRepositoryInterface;

class RoleService
{
    protected $roleRepositoryInterface;
 
    public function __construct(RoleRepositoryInterface $roleRepositoryInterface)
    {
        $this->roleRepositoryInterface = $roleRepositoryInterface;
    }

    public function getList()
    {
    	return $this->roleRepositoryInterface->getList();
    }

}