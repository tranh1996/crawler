<?php
namespace App\Repositories\Eloquents;

use App\Repositories\ItemRepositoryInterface;
use App\Models\Item;

class ItemRepository implements ItemRepositoryInterface
{
    protected $model;

    /**
     * construct Item from Model
     *
     * @param App\Models\Item $itemModel
     * @return void
     */
    public function __construct(Item $model)
    {
        $this->model = $model;
    }
    
    /**
     * get Item
     *
     * @param array $column
     * @return collection of item
     */
    public function getItem($column = ['*'])
    {
        $item = $this->model->select($column);
        
        return $item->paginate(8);
    }

    /**
     * create Item
     *
     * @param array $data
     * @return create item
     */
    public function createItem(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * find Item by id
     *
     * @param int $id
     * @return item 
     */
    public function findItemByID(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Update Item
     *
     * @param array $data, int $id
     * @return update item
     */
    public function updateItem(array $data, int $id)
    {
        return $this->findItemById($id)->update($data);

    }

    /**
     * Delete Item 
     *
     * @param int $id
     * @return delete item
     */
    public function deleteItem(int $id)
    {
        return $this->findItemById($id)->delete();
    }

}
?>