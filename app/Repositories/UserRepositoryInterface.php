<?php
namespace App\Repositories;

interface UserRepositoryInterface
{
    public function getUser($column = ['*']);

    public function createUser(array $data);

    public function updateUser(array $data, int $id);

	public function findUserByID(int $id);

    public function deleteUser(int $id);
}


?>