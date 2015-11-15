<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeviceTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddingDevices()
    {
        $this->post('/api/devices', [])
            ->seeJson([
                'id' => 1,
            ]);
        $this->seeInDatabase('devices', ['id' => 1]);
    }

    public function testListDevices() {
        $device = factory(\App\Device::class)->create();
        $this->get('/api/devices')
            ->seeJson([
                'name' => $device->name,
            ]);
    }
}
