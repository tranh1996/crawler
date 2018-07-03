<?php
namespace Tests\Unit\Repositories;

use App\Models\Item;
use Mockery;
use App\Services\ItemService;
use App\Repositories\Eloquents\ItemRepository;
use Tests\TestCase;

class ItemServiceTest extends TestCase
{
    private $mItemRepository;
    private $mItemService;
    private $mItemModel;

    public function setUp()
    {
        $this->mItemRepository = Mockery::mock('\App\Repositories\ItemRepositoryInterface');
        $this->mItemModel = Mockery::mock('\App\Models\Item');
       
        parent::setUp();
    }

    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testGetList()
    {
        $this->mItemRepository->shouldReceive('getItem')->andReturn(
        [(object) [
            'id' => 1,
            'title' => 'abc',
            'descriptionLink' => 'def',
            'descriptionImageLink' => 'ghi',
            'descriptionContent' => 'klm',
            'pubDate' => '111',
            'guid' => 'qqq',
            'channel_id' => 18,
            ]],

        [(object) [
            'id' => 2,
            'title' => 'abca',
            'descriptionLink' => 'defa',
            'descriptionImageLink' => 'ghia',
            'descriptionContent' => 'klma',
            'pubDate' => '111a',
            'guid' => 'qqqa',
            'channel_id' => 19,
            ]]
        );

        $this->mItemService = new ItemService($this->mItemRepository);
        $result = $this->mItemService->getList();
        $this->assertNotNull($result);
        $this->assertEquals($result[0]->id, 1);
    }

    public function testCreateItem()
    {
        $this->mItemRepository->shouldReceive('createItem')->andReturn('5');
        $this->mItemService = new ItemService($this->mItemRepository);
        $result = $this->mItemService->createItem([' ']);
        $this->assertNotNull($result);
        $this->assertEquals($result, 5);
    }

    public function testUpdateItem()
    {
        $data = [
         'id' => 2,
            'title' => 'abca',
            'descriptionLink' => 'defa',
            'descriptionImageLink' => 'ghia',
            'descriptionContent' => 'klma',
            'pubDate' => '111a',
            'guid' => 'qqqa',
            'channel_id' => 19,
        ];

       // $item = new Item;

        $mock = Mockery::mock('\App\Models\Item')->makePartial();
        $mock->shouldReceive('findOrFail')->andReturn($item);
        $item->update($data);
        $result = $this->mItemService->updateItem($data, 1);



    }
 

}


?>