@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper--narrow">
        <h1>Add member to family: {{ $group->family_name }}</h1>
        <a class="button button--secondary" href="{{ route('family-group.show', $group->slug) }}">Back</a>
        <x-member-form method="post" :model="$group" route="members.store" />
    </div>
@endsection