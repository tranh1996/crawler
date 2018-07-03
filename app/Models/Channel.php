<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'description',
        'pubDate',
        'generator',
        'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function items()
    {
    	return $this->hasMany('App\Models\Item', 'channel_id', 'id');
    }

    // public function toFillableArray()
    // {
    //     $ret = [];
    //     foreach ($this->fillable as $key) {
    //         $ret[$key] = $this->$key;
    //     }

    //     dd($ret);
    // }
}
