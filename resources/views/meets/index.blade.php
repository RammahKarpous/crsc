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
                <a href="{{ route('meets.show', $meet->slug) }}" class="meets--meet-info row row-5">
                    <p>{{ $meet->name }}</p>
                    <p>{{ $meet->venue }}</p>
                    <p>{{ date('d/m/Y', strtotime($meet->date)) }}</p>
                    <p>{{ $meet->pool_length }}</p>
                    
                    @auth
                        @if(Auth::user()->member_type_id == 3)
                            <p class="button button--primary">Update Meet</p> 
                        @else
                            <p class="button button--primary">View Events</p>
                        @endif

                    @else
                        <p class="button button--primary">View Events</p>
                    @endauth
                </a>
            @endforeach
        </div>
    </div>
@endsection