<?php
namespace Tests\Unit\Repositories;

use App\Models\Channel;
use Mockery;
use App\Services\ChannelService;
use App\Repositories\Eloquents\ChannelRepository;
use Tests\TestCase;


class ChannelServiceTest extends TestCase
{
    private $mChannelRepository;
    private $mChannelService;
    private $mChannel;
    private $channel;
    private $channelModel;

    public function setUp()
    {
        $this->mChannelRepository = Mockery::mock('\App\Repositories\ChannelRepositoryInterface');
        $this->mChannel = Mockery::mock('\App\Models\Channel');
        parent::setUp();
    }
    
    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testGetList()
    {   

        $this->mChannel->shouldReceive('find')->andReturn(5);
        
        $this->channel = new ChannelRepository($this->mChannel);
        $a = $this->channel->findChannelByID(18);
        //dd($a);
        $this->assertNotNull($a);

        $this->mChannelRepository->shouldReceive('get')->andReturn(
            [(object) [
                'id' => 18,
                'title' =>'abc' ,
                'description' => 'def',
                'pubDate' => '123',
                'generator' => 'aaa',
            ]],

            [(object) [
                'id' => 19,
                'title' =>'abcd' ,
                'description' => 'deef',
                'pubDate' => '12e3',
                'generator' => 'aaae',
            ]]
        );
        $this->mChannelService = new ChannelService($this->mChannelRepository);
        $result = $this->mChannelService->getList();
        //$result = $this->mChannelService->getList();
        //dd($return);
        $this->assertNotNull($result);
        $this->assertEquals($result[0]->id, 18);
        $this->assertEquals(count($result), 1);
    }

    public function testGetItemList()
    {
        $this->mChannelRepository->shouldReceive('getItemFromChannel')->andReturn(18);
        $this->mChannelService = new ChannelService($this->mChannelRepository);
        $result = $this->mChannelService->getItemList(1, []);
        $this->assertNotNull($result);
        $this->assertEquals($result, 18);
    }


}