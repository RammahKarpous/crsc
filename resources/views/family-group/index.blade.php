@extends('layouts.app')

@section('content')
    <h1>Family groups</h1>

    <a href="{{ route('family-group.create') }}">Add a family group</a>

    @foreach ($groups as $group)
        <a href="{{ route('family-group.show', $group->slug) }}">{{ $group->family_name }}</a>
    @endforeach
@endsection