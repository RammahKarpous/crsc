@extends('layouts.app')

@section('content')
<div class="wrapper">
    <a href="{{ route('meets.show', $event->meet->slug) }}" class="button button--secondary">Back</a>
    
    <h1>Event: {{ $event->slug }}</h1>

    <div class="bg-darker-gray p-20 mt-50 border-radius-12">
        <h2 class="m-0 ml-20">Event details</h2>
        
        <div class="table">
            <div class="row-8 bb-light-gray">
                <h4>Meet name</h4>
                <h4>Event code</h4>
                <h4>Start time</h4>
                <h4>End time</h4>
                <h4>Gender</h4>
                <h4>Distance</h4>
                <h4>Stroke</h4>
                <h4>Round</h4>
            </div>

            <div class="row-8">
                <p>{{ $event->meet->name }}</p>
                <p>{{ $event->slug }}</p>
                <p>{{ $event->start_time }}</p>
                <p>{{ $event->end_time }}</p>
                <p>{{ $event->gender }}</p>
                <p>{{ $event->distance }}</p>
                <p>{{ $event->stroke }}</p>
                <p>{{ $event->round }}</p>
            </div>
        </div>
    </div>

    <h2 class="mt-40">Participants</h2>

    <div class="table">
        <div class="row-4">
            <h4>Participant</h4>
            <h4>Lane</h4>
            <h4>Result</h4>
        </div>

        @foreach ($event->users as $user)
            <div class="row row-4">
                <p>{{ $user->name }} {{ $user->family_group->family_name }}</p>
                <p>{{ $user->lane }}</p>
                <p class="gcol-3-5">{{ $user->result ? $user->result : '' }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection