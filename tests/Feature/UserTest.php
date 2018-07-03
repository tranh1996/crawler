<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Channel;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $user = factory(User::class, 3)->create();
        $this->assertEquals(3, $user->count());
    }

    public function testUpdate()
    {
        $user = factory(User::class)->create();

        $result = $user->update([
            'name' => 'tranhnv',
        ]);
        $this->assertEquals(true, $result);
    }

    public function testDetele()
    {
        $user = factory(User::class)->create();
        $result = $user->delete();
        $this->assertEquals(true, $result);
    }
}
