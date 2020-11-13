@extends('layouts.app')

@section('title', 'Meets')

@section('content')
    <h1>Meets</h1>

    <a href="{{ route('meets.create') }}" class="btn btn-primary">Add a Meet</a>

    <div class="meets">
        @foreach ($meets as $meet)
            <div class="meets--meet-info mt-4">
                <a href="{{ route('meets.show', $meet->slug) }}">{{ $meet->name }}</a>
                <p>{{ $meet->venue }}</p>
                <p>{{ date('d/m/Y', strtotime($meet->date)) }}</p>
                <p>{{ $meet->pool_length }}</p>
                <a href="{{ route('meets.edit', $meet->slug) }}" class="btn btn-secondary">Update even</a>
            </div>
        @endforeach
    </div>
@endsection