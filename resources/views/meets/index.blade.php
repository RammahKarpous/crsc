@extends('layouts.app')

@section('title', 'Meets')

@section('content')
    <div class="wrapper">
        
        <div class="page-title-with-buttons">
            <h1>Meets</h1>
            
            @auth
                @if (Auth::user()->member_type_id == 3)
                    <div class="buttons--wrapper buttons--wrapper-horizontal">
                        <a href="{{ route('meets.create') }}" class="button button--primary">Add a Meet</a>
                    </div>
                @endif
            @endauth
            
        </div>

        <div class="table">
            <div class="row-5 no-bg border-bottom">
                <h4>Meet name</h4>
                <h4>Venue</h4>
                <h4>Date</h4>
                <h4>Pool length</h4>
                <p></p>
            </div>

            @foreach ($meets as $meet)
                <div class="meets--meet-info row row-5">
                    <p>{{ $meet->name }}</p>
                    <p>{{ $meet->venue }}</p>
                    <p>{{ date('d/m/Y', strtotime($meet->date)) }}</p>
                    <p>{{ $meet->pool_length }}</p>
                    
                    @auth
                        @if(Auth::user()->member_type_id == 3)
                            <a href="#" id="update-meet" class="button button--primary">Update Meet</a>

                            <form class="form gcol-1-6 row-5 align-center" action="{{ route('meets.update', $meet->id) }}" method="POST">

                                <div class="form__group">
                                    <input type="text" name="name" id="name" class="form__input form__input--text" value="{{ $meet->name }}">
                                </div>

                                <div class="form__group">
                                    <input type="text" name="venue" id="venue" class="form__input form__input--text" value="{{ $meet->venue }}">
                                </div>

                                <div class="form__group">
                                    <input type="date" name="date" id="date" class="form__input form__input--text" value="{{ date('Y/m/d', strtotime($meet->date)) }}">
                                </div>

                                <div class="form__group">
                                    <input type="number" name="pool_length" id="pool_length" class="form__input form__input--text" value="{{ $meet->pool_length }}">
                                </div>
                                @csrf
                                @method('PATCH')
                                <input type="submit" value="Update" class="button button--secondary">
                            </form>
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