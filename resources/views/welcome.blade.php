@extends('layouts.app')

@section('content')
<div class="wrapper">
    <h1>Events</h1>

    @foreach ($events as $event)
        <a href="#{{ $event->slug }}">{{ $event->slug }}</a>

        <p>{{ $event->meet->date }} {{ $time }} {{ $date }}</p>
    @endforeach

    @foreach ($events as $event)
        @if (now() >= $event->start_time && now() <= $event->end_time)
            <div id="{{ $event->slug }}">
                <p>{{ $event->start_time }}</p>
                <p>{{ $event->end_time }}</p>
            </div>

        @else
            <p>There are no events at the moment.</p>
        @endif
    @endforeach

</div>
@endsection
