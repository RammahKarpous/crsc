@extends('layouts.app')

@section('title', 'Meet: ' . $meet->name)

@section('content')
    <h1>{{ $meet->name }}</h1>

    <a href="{{ route('meets.create') }}" class="btn btn-primary">Add an Event</a>

    <div class="meet">
        @if ($meet->events)
            @foreach ($meet->events as $event)
                <div class="event mt-4">
                    <p>{{ $meet->name }}</p>
                    <p>{{ $meet->venue }}</p>
                    <p>{{ date('d/m/Y', strtotime($meet->date)) }}</p>
                    <p>{{ $meet->pool_length }}</p>
                    <a href="{{ route('meets.edit', $meet->slug) }}" class="btn btn-secondary">Update even</a>
                </div>
            @endforeach
        @endif
    </div>
@endsection