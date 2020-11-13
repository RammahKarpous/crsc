@extends('layouts.app')

@section('content')
    <h1>Family groups</h1>

    <a href="{{ route('family-group.create') }}">Add a family group</a>

    @foreach ($parents as $parent)
        <p>{{ $parent->name }}</p>
    @endforeach
@endsection