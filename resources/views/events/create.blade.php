@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper--narrow">
        <h1>Add member to family: {{ $meet->name }}</h1>
        <a class="button button--secondary" href="{{ route('meets.show', $meet->slug) }}">Back</a>
        <x-event-form method="post" :model="$meet" route="events.store" />
    </div>
@endsection