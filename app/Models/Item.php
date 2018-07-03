<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'descriptionLink',
        'descriptionImageLink',
        'descriptionContent',
        'pubDate',
        'guid',
        'channel_id',
    ];

    public function channel()
    {
    	return $this->belongsTo('App\Models\Channel', 'channel_id');
    }
}
