@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper--narrow">
        <h1>Updating family: {{ $group->family_name }}</h1>
        @auth
            @if (Auth::user()->member_type_id == 3)
                <a class="button button--secondary mb-20" href="{{ route('family-group.show', $group->slug) }}">Back</a>
            @elseif(Auth::user()->member_type_id == 1)
                <a class="button button--secondary mb-20" href="{{ route('home') }}">Back</a>
            @endif
        @endauth
        <x-family-form route="family-group.update" method="put" :model="$group" />
    </div>
@endsection