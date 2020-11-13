@extends('layouts.app')

@section('content')
    <h1>Update family: {{ $group->family_name }}</h1>
    
    <a href="{{ route('family-group.show', $group->slug) }}" class="btn btn-primary my-2">Back to family group</a>
    <x-family-form route="family-group.update" method="put" :model="$group" />
@endsection