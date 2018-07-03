<?php
namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserService
{
    protected $userRepository;
 
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser()
    {
        return $item = $this->userRepository->getUser();
    }

    public function createUser(array $data)
    {
        return $this->userRepository->createUser($data);
    }

    public function updateUser(array $data, int $id)
    {
        return $this->userRepository->updateUser($data, $id);
    }

    public function deleteUser(int $id)
    {
        return $this->userRepository->deleteUser($id);
    }

}
?>