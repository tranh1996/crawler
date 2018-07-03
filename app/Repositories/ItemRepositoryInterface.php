<?php
namespace App\Repositories;

interface ItemRepositoryInterface
{
    public function getItem($column = ['*']);

    public function createItem(array $data);

    public function updateItem(array $data, int $id);

    public function findItemByID(int $id);

    public function deleteItem(int $id);
}

?>