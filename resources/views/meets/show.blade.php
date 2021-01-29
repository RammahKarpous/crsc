@extends('layouts.app')

@section('title', 'Meet: ' . $meet->name)

@section('content')
    <div class="wrapper py-20">
        @auth
            @if(Auth::user()->member_type_id == 3)
                <div class="page-title-with-buttons">
                    <h1>{{ $meet->name }}</h1>

                    <div class="buttons--wrapper buttons--wrapper-horizontal">
                        <a href="{{ route('meets.index') }}" class="button button--secondary">Back</a>
                        <a href="{{ route('events.create', $meet->slug) }}" class="button button--primary">Add an Event</a>
                    </div>
                </div>
            @else
                <h1>{{ $meet->name }}</h1>
                <a href="{{ route('meets.index') }}" class="button button--secondary">Back</a>
            @endif
        @else
            <h1>{{ $meet->name }}</h1>
            <a href="{{ route('meets.index') }}" class="button button--secondary">Back</a>
        @endauth

        <h2 class="mb-0">Filter meet</h2>
        <div class="buttons--wrapper buttons--wrapper-horizontal">
            <form class="form" action="{{ route('meets.filter') }}" method="post">
                <div class="col-8">
                    <div class="form__group">
                        <label for="venue">Age range</label>
                        <select type="text" name="venue" class="form__input form__input--select" id="venue">
                            <option value="venue" selected disabled>Age range</option>
                            @foreach ($age_ranges as $range)
                                <option {{ $range === $meet->venue ? 'selected' : '' }} value="{{ $range->id }}">{{ ucfirst($range->age_range) }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form__group">
                        <label for="venue">Gender</label>
                        <select type="text" name="venue" class="form__input form__input--select" id="venue">
                            <option value="venue" selected disabled>Gender</option>
                            @foreach ($venues as $meet)
                                <option {{ $venue === $meet->venue ? 'selected' : '' }} value="{{ $meet->venue }}">{{ ucfirst($meet->venue) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form__group">
                        <label for="venue">Distance</label>
                        <select type="text" name="venue" class="form__input form__input--select" id="venue">
                            <option value="venue" selected disabled>Distance</option>
                            @foreach ($venues as $meet)
                                <option {{ $venue === $meet->venue ? 'selected' : '' }} value="{{ $meet->venue }}">{{ ucfirst($meet->venue) }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <input type="submit" value="filter" class="button button--primary">
                </div>
                
                <a href="{{ route('meets.index') }}" class="button button__link py-14 ml-5">Clear</a>
                @csrf
            </form>

        </div>

        <div class="events">
            <h2>Events</h2>

            <div class="table">
                <div class="@auth row-8 @else row-7 @endauth">
                    <h4>Age range</h4>
                    <h4>Start / End time</h4>
                    <h4>Gender</h4>
                    <h4>Distance (m)</h4>
                    <h4>Stroke</h4>
                    <h4>Round</h4>
                    <h4></h4>
                </div>

                @if ($meet->events)
                    @foreach ($meet->events as $event)
                        <div class="row @auth row-8 @else row-7 @endauth">
                            <p>{{ $event->age_range->age_range }}</p>
                            <p>{{ \Carbon\Carbon::createFromFormat('H:i:s', $event->start_time)->format('H:i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $event->end_time)->format('H:i') }}</p>
                            <p>{{ $event->gender }}</p>
                            <p>{{ $event->distance }}</p>
                            <p>{{ $event->stroke }}</p>
                            <p>{{ $event->round }}</p>

                            @auth
                                <div class="row-2 gcol-7-9">
                                    <a href="{{ route('events.show', $event->slug) }}" class="button button--primary">View event</a>
                                    <a href="{{ route('events.add-swimmers', $event->slug) }}" class="button button--secondary">Add swimmers</a>
                                </div>
                            @else
                                <a href="{{ route('events.show', $event->slug) }}" class="button button--primary">View event</a>
                            @endauth
                        </div>
                    @endforeach
                @endif
            
            </div>
        </div>
    </div>
@endsection