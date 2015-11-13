<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <div class="container">
            <h1>Events</h1>
            @foreach ($events as $event)
                <p> {{ $event->device->name }}</p>
                <p>{{ $event->name }}</p>
                <ul>
                @foreach ($event->metadata as $data)
                    <li><strong>{{ $data->key  }}</strong> {{ $data->value }}</li>
                @endforeach
                </ul>
                <hr/>
            @endforeach
        </div>
    </body>
</html>
