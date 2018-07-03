<?php
namespace App\Repositories;
use App\Models\Channel;

interface ChannelRepositoryInterface
{
    public function get($column);

    public function findChannelByID(int $id);

    public function getItemFromChannel(int $id, array $request);
}

?>