@extends('layouts.app')

@section('content')
<div>
    <h1>{{ $group->family_name }}</h1>

    <a href="{{ route('family-group.edit', $group->slug) }}" class="btn btn-primary mr-1">Update group info</a>

    <a href="{{ route('family-group.index') }}" class="btn btn-secondary mr-1">Back to family groups</a>

    <a href="{{ route('members.create', $group->slug) }}" class="btn btn-outline-secondary mr-1">Add member</a>
    
    @if (count($group->users) > 0)
        <div>
            <h2>Parents/Guardians</h2>
            
            @foreach ($group->users as $user)
                <div>
                    @if (($user->status->status === 'pending' || $user->status->status === 'active' ) && $user->member_type_id === 1)
                        <div>
                            <p>{{ $user->name }}</p>
                            <p>{{ $user->gender }}</p>
                            <p>{{ date('d/m/Y', strtotime($user->dob)) }}</p>
                            <p>{{ $user->status->status }}</p>

                            <a class="btn btn-primary">Update</a>
                        </div>
                        
                        <x-member-form route="members.update" :model="$member" method="put" />
                    @endif
                </div>
            @endforeach
        </div>

        <div>
            <h2>Swimmers</h2>
            
            @foreach ($group->users as $user)
                <div>
                    @if (($member->status->status === 'pending' || $user->status->status === 'active' ) && $user->member_type_id === 2)
                        <div>
                            <p>{{ $user->name }}</p>
                            <p>{{ $user->gender }}</p>
                            <p>{{ date('d/m/Y', strtotime($user->dob)) }}</p>
                            <p>{{ $user->status->status }}</p>

                            <a class="btn btn-primary">Update</a>
                        </div>
                        
                        <x-member-form route="members.update" :model="$member" method="put" />
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection