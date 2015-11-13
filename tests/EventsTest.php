<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddEvent()
    {
        $event = [
            'name' => 'OPENED_MOVIE',
            'device_id' => 1,
            'metadata' => [
                'title' => 'Bond 007'
            ]
        ];

        $this->post('api/events', $event)->seeStatusCode(201);

        $this->seeInDatabase('events', [
            'name' => $event['name'],
            'device_id' => $event['device_id']
        ]);

        $this->seeInDatabase('metadata', [
            'key' => 'title',
            'value' => $event['metadata']['title']
        ]);
    }
}
