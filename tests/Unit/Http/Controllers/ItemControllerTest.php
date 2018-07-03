<?php
namespace Tests\Unit\Http\Controllers;

use App\Models\Item;
use Mockery;
use App\Http\Controllers\ItemController;
use Tests\TestCase;
use Tests\Unit\Http\Controllers\temperature;

class ItemControllerTest extends TestCase
{
	public function tearDown()
    {
        Mockery::close();
    }

    public function testGetsAverageTemperatureFromThreeServiceReadings()
    {
        $service = Mockery::mock('service');
        $service->shouldReceive('readTemp')
            ->andReturn(10);

        $temperature = new Temperature($service);

        $this->assertEquals(5, $temperature->average());
    }

    public function testSimpleMock()
    {
        $mock = \Mockery::mock(array('pi' => 3.1416, 'e' => 2.71));
        $this->assertEquals(3.1416, $mock->pi());
        $this->assertEquals(2.71, $mock->e());
    }

    public function testUndefinedValues()
    {
        $mock = \Mockery::mock('aaaa');
        $mock->shouldReceive('fasdsdafasdfasdf')->with(0)->andReturnUndefined();
        $this->assertTrue($mock->fasdsdafasdfasdf(0) instanceof \Mockery\Undefined);
    }


    public function testClass()
    {
     $mock = \Mockery::mock('MyClass');
        $mock->shouldReceive('foo')
        ->andReturn(2, 3, 4);

        $this->assertEquals(2, $mock->foo());
        $this->assertEquals(3, $mock->foo());
        $this->assertEquals(4, $mock->foo());
        $this->assertEquals(4, $mock->foo());
        // ... test code here using the mock
    }
 }



?>