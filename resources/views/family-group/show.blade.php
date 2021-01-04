@extends('layouts.app')

@section('content')

<p class="hidden-element">{{ $rows = 'row-5' }}</p>

<div class="wrapper">
    <div class="page-title-with-buttons">
        <h1>Family {{ $group->family_name }}</h1>
        <div>
            <a href="{{ route('family-group.edit', $group->slug) }}" class="button button--primary">Update group info</a>
        </div>
    </div>

    <a href="{{ route('family-group.index') }}" class="button button--secondary mr-5">Back</a>
    
    @auth
        @if (Auth::user()->member_type_id == 3)
            <a href="{{ route('members.create', $group->slug) }}" class="button button--primary">Add member</a>        
        @endif
    @endauth
    

    @if (count($group->users) > 0)
        <div>
            <h2>Parents / Guardians</h2>
            
            <div class="table">
                <div class="{{ $rows }}">
                    <h4>Name</h4>
                    <h4>Gender</h4>
                    <h4>Date of birth</h4>
                </div>
            </div>

            <div class="table">
                @foreach ($group->users as $user)
                    @if (($user->status->status === 'pending' || $user->status->status === 'active' ) && $user->member_type_id === 1)
                        <div class="row {{ $rows }}">
                            <p>{{ $user->name }}</p>
                            <p>{{ $user->gender }}</p>
                            <p>{{ date('d/m/Y', strtotime($user->dob)) }}</p>
                            <p class="status--{{ $user->status->status }}">{{ $user->status->status }}</p>
                            <a href="{{ route('members.edit', $user->slug) }}" class="button button--primary">Update member details</a>
                        </div>
                        
                    @endif
                @endforeach
            </div>
        </div>

        <div>
            <h2>Swimmers</h2>

            <div class="table">
                @foreach ($group->users as $user)
                    @if (($user->status->status === 'pending' || $user->status->status === 'active' ) && $user->member_type_id === 2)
                        <div class="row {{ $rows }}">
                            <p>{{ $user->name }}</p>
                            <p>{{ $user->gender }}</p>
                            <p>{{ date('d/m/Y', strtotime($user->dob)) }}</p>
                            <p class="status--{{ $user->status->status }}">{{ $user->status->status }}</p>
                            <a href="{{ route('members.edit', $user->slug) }}" class="button button--primary">Update member details</a>
                        </div>
                        
                    @endif
                @endforeach
            </div>
        </div>

        <div>
            <h2>Archived</h2>

            <div class="table">
                @foreach ($group->users as $user)
                    @if (($user->status->status === 'archived' ))
                        <div class="row {{ $rows }}">
                            <p>{{ $user->name }}</p>
                            <p>{{ $user->gender }}</p>
                            <p>{{ date('d/m/Y', strtotime($user->dob)) }}</p>
                            <p class="status--{{ $user->status->status }}">{{ $user->status->status }}</p>
                            <a href="{{ route('members.edit', $user->slug) }}" class="button button--primary">Update member details</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>

@endsection