<?php
namespace App\Repositories\Eloquents;

use App\Repositories\ChannelRepositoryInterface;
use App\Models\Channel;

class ChannelRepository implements ChannelRepositoryInterface
{
    protected $channelModel;

    /**
     * construct Channel from Model
     *
     * @param App\Models\Channel $channelModel
     * @return void
     */
    public function __construct(Channel $channelModel)
    {
        $this->channelModel = $channelModel;
    }
    
    /**
     * get channel
     *
     * @param array $column
     * @return collection of channel
     */
    public function get($column = ['*'])

    {
        return $this->channelModel->select($column)->get();
    }

    /**
     * find channel by id
     *
     * @param int $id
     * @return collection of channel
     */
    public function findChannelByID(int $id)
    {
        return $this->channelModel->find($id);
    }

    /**
     * get item from channel
     *
     * @param int $id
     * @param array $request
     * @return collection of channel
     */
    public function getItemFromChannel(int $id, array $request)
    {

        $channel = $this->channelModel->find($id);
        
        $item = $channel->items();

        if (isset($request['search'])) {
           
            $item = $item->where('channel_id', '=', $id)
                         ->where('title', 'like', '%'. $request['search']. '%')
                         ->orWhere('descriptionContent', 'like', '%'. $request['search']. '%')
                         ->orWhere('pubDate', 'like', '%'. $request['search']. '%');
        }
        return $item->paginate(8);
    }

}
?>