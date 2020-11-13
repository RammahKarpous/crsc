@extends('layouts.app')

@section('content')
    <h1>Add member to family: {{ $group->family_name }}</h1>
    <a href="{{ route('family-group.show', $group->slug) }}">Back</a>
    <x-member-form method="post" :model="$group" route="members.store" />
@endsection