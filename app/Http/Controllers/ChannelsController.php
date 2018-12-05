<?php
namespace App\Http\Controllers;

use App\Services\ChannelService;
use App\Services\ItemService;
use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    protected $channelService;

    /**
     * create new class instance
     *
     * @param App\Services\channelService $channelService
     * @return void
     */
    public function __construct(ChannelService $channelService)
    {
        $this->channelService = $channelService;
      
        $this->middleware('auth');
        var_dump($a);
    }

    /**
     * List of Item on channel
     *
     * @param int $id
     * @param Illuminate\Http\Request $request;
     * @return \Iluminate\Http\Respone
     */
    public function index(int $id = 1, Request $request)
    {
        $channel = $this->channelService->getChannelById($id);
        $channels = $this->channelService->getList();
        $keyWords = $request->all();
        $items =  $this->channelService->getItemList($id, $keyWords);
        return view('items.index', compact('items', 'channels', 'keyWords', 'id', 'channel'));
    }

}
