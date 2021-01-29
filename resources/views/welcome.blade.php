@extends('layouts.app')

@section('content')
<div class="wrapper">
    <h1>Events</h1>

    @if (count($events) > 0)
        <div class="table">
            <div class="row-6 p-10 flex--align-start">
                <nav class="sidebar sidebar--bg-white">
                    <ul class="sidebar__list">
                        @foreach ($events as $event)
                            <li class="sidebar__item"><a class="sidebar__link" href="#{{ $event->slug }}">{{ $event->slug }}</a></li>
                        @endforeach
                    </ul>   
                </nav>

                <div class="table gcol-2-8">
                    <div class="row row-8 mb-20">
                        <h4>Meet name</h4>
                        <h4>Meet date</h4>
                        <h4>Start time</h4>
                        <h4>End time</h4>
                        <h4>Gender</h4>
                        <h4>Distance</h4>
                        <h4>Stroke</h4>
                        <h4>Round</h4>
                    </div>

                    @foreach ($events as $event)
                        <div class="table mb-50 pb-5 bb-light-gray">
                            <div class="row">
                                <div class="row-8 by-light-gray bg-darker-gray" id="{{ $event->slug }}">
                                    <p>{{ $event->meet->name }}</p>
                                    <p>{{ date('d/m/Y', strtotime($event->meet->date)) }}</p>
                                    <p>{{ \Carbon\Carbon::createFromFormat('H:i:s', $event->start_time)->format('H:i') }}</p>
                                    <p>{{ \Carbon\Carbon::createFromFormat('H:i:s', $event->end_time)->format('H:i') }}</p>
                                    <p>{{ $event->gender }}</p>
                                    <p>{{ $event->distance }}</p>
                                    <p>{{ $event->stroke }}</p>
                                    <p>{{ $event->round }}</p>
                                </div>
                                
                                <div class="row-4 bg-darker-gray">
                                    <h4>Participant</h4>
                                    <h4>Lane</h4>
                                    <h4>Result</h4>
                                </div>

                                @foreach ($event->users as $user)
                                    <div class="row-4">
                                        <p>{{ $user->name }} {{ $user->family_group->family_name }}</p>
                                        <p>{{ $user->lane }}</p>
                                        <p class="gcol-3-5">{{ $user->result ? $user->result : '' }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <p>There are no meets and events.</p>
    @endif
</div>
@endsection
