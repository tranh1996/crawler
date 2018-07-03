<?php
namespace App\Services;

use App\Repositories\ChannelRepositoryInterface;

class ChannelService
{
    protected $channelRepositoryInterface;
 
    public function __construct(ChannelRepositoryInterface $channelRepositoryInterface)
    {
        $this->channelRepositoryInterface = $channelRepositoryInterface;

    }

    public function getList()
    {
        return $channel =  $this->channelRepositoryInterface->get(['*']);
    }

    public function getItemList($id, $request)
    {
        return $item = $this->channelRepositoryInterface->getItemFromChannel($id, $request);     
    }

    public function getChannelByID(int $id)
    {
        return $this->channelRepositoryInterface->findChannelByID($id);
    }

}
?>