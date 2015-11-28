<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <div class="container">
            <h1>Events</h1>
            @foreach ($events as $event)
                @if (isset($event->device))
                <p> {{ $event->device->name }}</p>
                @else
                    <p>missing device</p>
                @endif
                <p>{{ $event->name }}</p>
                <p>
                    {{ $event->created_at->format('d/m/Y') }}
                    {{ $event->created_at->diffForHumans() }}
                </p>
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
