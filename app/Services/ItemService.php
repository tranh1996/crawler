<?php
namespace App\Services;

use App\Repositories\ItemRepositoryInterface;
use App\Models\Item;

class ItemService
{
    protected $itemRepositoryInterface;
 
    public function __construct(ItemRepositoryInterface $itemRepositoryInterface)
    {
        $this->itemRepositoryInterface = $itemRepositoryInterface;
    }

    public function getList()
    {
        return $item = $this->itemRepositoryInterface->getItem();
    }

    public function createItem(array $data)
    {
        return $this->itemRepositoryInterface->createItem($data);
    }

    public function updateItem(array $data, int $id)
    {
        $item = Item::findOrFail($id);
        return $item->update($data);
    }

    public function findItemById(int $id)
    {
        return $this->itemRepositoryInterface->findItemByID($id);
    }

    public function deleteItem(int $id)
    {
        return $this->itemRepositoryInterface->deleteItem($id);
    }


}
?>