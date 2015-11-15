<?php

date_default_timezone_set('Australia/Brisbane');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $events = \App\Events::all();

    return view('welcome', compact('events'));
});

Route::group(["prefix" => 'api', 'middleware' => 'cors'], function() {
    Route::post('devices', function() {
        $faker = Faker\Factory::create();
        $device = \App\Devices::create([
            "name" => $faker->name
        ]);

        // Also create an event for registration
        $event = [
            'name' => 'DEVICE_ADDED',
            'device_id' => $device->id,
            'metadata' => []
        ];
        \App\Events::create($event);

        return response()->json($device, 201);
    });

    Route::get('devices', function() {
        $devices = \App\Devices::all();
        return response()->json($devices);
    });

    Route::post('events', function() {
        $data = \Illuminate\Support\Facades\Input::except('metadata');
        $event = \App\Events::create($data);
        $data = \Illuminate\Support\Facades\Input::get('metadata');
        foreach($data as $key => $value) {
            \App\Metadata::create([
                'event_id' => $event->id,
                'key' => $key,
                'value' => $value
            ]);
        }
        return response()->json($event, 201);
    });
});
