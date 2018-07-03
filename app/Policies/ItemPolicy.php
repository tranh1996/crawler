<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the item.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Item  $item
     * @return mixed
     */
    public function view(User $user, Item $item)
    {
        return TRUE;
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
         return $user->id > 0;
    }

    /**
     * Determine whether the user can update the item.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Model\Item  $item
     * @return mixed
     */
    public function update(User $user, Item $item)
    {
        return $user->id == $item->channel->user_id;
    }

    /**
     * Determine whether the user can delete the item.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Modlel\Item  $item
     * @return mixed
     */
    public function delete(User $user, Item $item)
    {
        return $user->id == 1;
    }
}
