<?php
namespace App\Http\Controllers;

use App\Services\ItemService;
use App\Models\Item;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Auth;
use App\Events\adminDelete;

class ItemsController extends Controller
{
    protected $itemService;

    /**
     * create new class instance
     *
     * @param App\Services\ItemService $itemService
     * @return void
     */
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
        $this->middleware('auth');
    }

    /**
     * create new Items
     *
     * @return \Iluminate\Http\Respone
     */
    public function create(int $channel_id)
    {
            
        return view('items.create', compact('channel_id'));
    }

    /**
     * Store new Items
     *
     * @param App\Http\Requests\ItemRequest $request
     * @return \Iluminate\Http\Respone
     */
    public function store(ItemRequest $request)
    {
        $datas = $request->all();
        $success = $this->itemService->createItem($datas);
        if ($success) {
            flash(__('Create item successfully'))->success();
            return redirect()->route('item.create', $request->channel_id);
        } else {
            flash (__('Create job failed , please try again'))->error();
            return redirect()->back();
        }
    }

    /**
     * show edit items
     *
     * @param int $id
     * @return \Iluminate\Http\Respone
     */
    public function edit(int $id)
    {
        $user = Auth::user(); 
        $item = $this->itemService->findItemByID($id);
       
        $channel_id = $item->channel_id;

        return view('items.edit', compact('item', 'channel_id'));
        
    }

    /**
     * update item
     *
     * @param App\Http\Requests\ItemRequest $request
     * @param int $id
     * @return \Iluminate\Http\Respone
     */
    public function update(ItemRequest $request, int $id)
    {
        $success = $this->itemService->updateItem($request->all(), $id);
        if ($success) {
            flash('Edit item successfull')->success();
            return redirect()->route('item.edit', $id);
        } else {
            flash('Edit item failed, please try again')->error();
            return redirect()->back();
        }
    }

    /**
     * delete item
     *
     * @param int $id
     * @return \Iluminate\Http\Respone
     */
    public function delete(int $id)
    {   
        $item = $this->itemService->findItemByID($id);
        $channel_id = $item->channel_id;
        $success = $this->itemService->deleteItem($id);
        event(new adminDelete($item));
        if ($success) {
            flash('Delete item successfull')->success();
            return redirect()->route('channels.index', $channel_id);
        } else {
            flash('Delete item false')->error();
            return redirect()->back();
        }

    }

}
