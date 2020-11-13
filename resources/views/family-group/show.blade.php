@extends('layouts.app')

@section('content')
<div>
    <h1>{{ $group->family_name }}</h1>

    <a href="{{ route('family-group.edit', $group->slug) }}" class="btn btn-primary mr-1">Update group info</a>

    <a href="{{ route('family-group.index') }}" class="btn btn-secondary mr-1">Back to family groups</a>

    <a href="{{ route('family-group.create-member', $group->slug) }}" class="btn btn-outline-secondary mr-1">Add member</a>
    
    @if (count($group->members) > 0)
        <div>
            <h2>Parents/Guardians</h2>
            
            @foreach ($group->members as $member)
                <div>
                    @if (($member->status->status === 'pending' || $member->status->status === 'active' ) && $member->member_type_id === 1)
                        <div>
                            <p>{{ $member->name }}</p>
                            <p>{{ $member->gender }}</p>
                            <p>{{ date('d/m/Y', strtotime($member->dob)) }}</p>
                            <p>{{ $member->status->status }}</p>

                            <a class="btn btn-primary">Update</a>
                        </div>
                        
                        <x-member-form route="members.update" :model="$member" method="put" />
                    @endif
                </div>
            @endforeach
        </div>

        <div>
            <h2>Swimmers</h2>
            
            @foreach ($group->members as $member)
                <div>
                    @if (($member->status->status === 'pending' || $member->status->status === 'active' ) && $member->member_type_id === 2)
                        <div>
                            <p>{{ $member->name }}</p>
                            <p>{{ $member->gender }}</p>
                            <p>{{ date('d/m/Y', strtotime($member->dob)) }}</p>
                            <p>{{ $member->status->status }}</p>

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