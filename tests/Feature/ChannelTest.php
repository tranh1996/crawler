<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Item;

class ChannelTest extends TestCase
{

    public function testGetInstance()
    {
        $controller = \App::make(\App\Http\Controllers\ChannelsController::class);
        $this->assertNotNull($controller);
    }

    public function testGetList()
    {
        $this->createModel();
        $response = $this->get("/channel/index");
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $this->createModel();
        $response = $this->get("1/item/create");    
        $response->assertStatus(200);
    }


    public function testDeleteModel()
    {
        $channel = $this->createModel();
        $item =  factory(Item::class, 10)->create();
        //dd($item);
        $id = $item['0']->id;

        $response = $this->get("/item/delete/". $id);
        $response->assertStatus(302);
        // $response->assertRedirect("/channel/index/". $channel->id);

        // $checkArticle = Channel::find($id);
        // $this->assertNull($checkArticle);
    }   
    
}
