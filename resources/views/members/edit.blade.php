@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper--narrow">
        <h1>Updating family member: {{ $group->family_name }}</h1>
        @auth
            @if (Auth::user()->member_type_id == 3)
                <a class="button button--secondary" href="{{ route('family-group.show', $group->slug) }}">Back</a>
            @elseif(Auth::user()->member_type_id == 1)
                <a class="button button--secondary" href="{{ route('home') }}">Back</a>
            @endif
        @endauth
        <x-member-form route="members.update" :model="$user" method="put" />
    </div>
@endsection