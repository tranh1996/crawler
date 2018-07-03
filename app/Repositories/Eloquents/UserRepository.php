<?php
namespace App\Repositories\Eloquents;

use App\Repositories\UserRepositoryInterface;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    
    public function getUser($column = ['*'])
    {
        $item = $this->model->select($column);
        
        return $item->paginate(8);
    }

    public function createUser(array $data)
    {
        return $this->model->create($data);
    }

    public function findUserByID($id)
    {
        return $this->model->findOrFail($id);
    }

    public function updateUser(array $data, int $id)
    {
        return $this->findItemById($id)->update($data);

    }

    public function deleteUser(int $id)
    {
        return $this->findItemById($id)->delete();
    }

}

?>