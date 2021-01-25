@extends('layouts.app')

@section('title', 'Meets')

@section('content')
    <div class="wrapper">
        
        <div class="page-title-with-buttons">
            <div class="buttons--wrapper buttons--wrapper-horizontal">
                <h1>Meets</h1>

                <form class="form" action="{{ route('meets.filter') }}" method="post">
                    
                    <div class="col-6">
                        <div class="form__group gcol-1-4">
                            <select type="text" name="venue" class="form__input form__input--text">
                                <option value="venue" selected disabled>Venue name</option>
                                @foreach ($venues as $meet)
                                    <option value="{{ $meet->venue }}">{{ ucfirst($meet->venue) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="submit" value="filter" class="button button--primary">
                    </div>
                    @csrf
                </form>
            </div>
            @auth
                @if (Auth::user()->member_type_id == 3)
                    <a href="{{ route('meets.create') }}" class="button button--primary">Add a Meet</a>
                @endif
            @endauth
        </div>

        <div class="table">
            <div class="@auth @if(Auth::user()->member_type_id == 3) row-6 @else row-5 @endif @else row-5 @endauth no-bg border-bottom">
                <h4>Meet name</h4>
                <h4>Venue</h4>
                <h4>Date</h4>
                <h4>Pool length</h4>
                <p></p>
            </div>

            @foreach ($meets as $meet)
                <div class="meets--meet-info row @auth @if(Auth::user()->member_type_id == 3) row-6 @else row-5 @endif @else row-5 @endauth">
                    <p>{{ ucfirst($meet->name) }}</p>
                    <p>{{ ucfirst($meet->venue) }}</p>
                    <p>{{ date('d/m/Y', strtotime($meet->date)) }}</p>
                    <p>{{ $meet->pool_length }}</p>
                    
                    @auth
                        @if(Auth::user()->member_type_id == 3)
                            <div class="row-2 gcol-5-7">
                                <a href="{{ route('meets.show', $meet->slug) }}" class="button button--primary">View Events</a>
                                <a href="{{ route('meets.edit', $meet->slug) }}" id="update-meet" class="button button--secondary">Update Meet</a>
                            </div>
                        @else
                            <a href="{{ route('meets.show', $meet->slug) }}" class="button button--primary">View Events</a>
                        @endif

                    @else
                        <a href="{{ route('meets.show', $meet->slug) }}" class="button button--primary">View Events</a>
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
@endsection