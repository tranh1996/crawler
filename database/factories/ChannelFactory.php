<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Channel::class, function (Faker $faker) {
    return [
        'title' => '123',
        'description' => '456',
        'pubDate' => 'abc',
        'generator' => 'def',
        'user_id' => 1,
    ];
});

$factory->define(App\Models\Item::class, function (Faker $faker) {
    return [
        'title' => 'aaa',
        'descriptionLink' => 'aaa',
        'descriptionImageLink' => 'aaa',
        'descriptionContent' => 'aaa',
        'pubDate' => 'aaa',
        'guid' => 'aaa',
        'channel_id' => 1,
    ];
});


