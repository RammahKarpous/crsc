@extends('layouts.app')

@section('content')
<div class="wrapper">
    <p>{{ Auth::user()->name }} @if(Auth::user()->family_group_id) {{ Auth::user()->family_group->family_name }} @endif</p>

    @if (Auth::user()->member_type_id === 1)
        <h3>Edit details</h3>

        {{ Auth::user()->family_group->contact_number }}
    @endif
</div>
@endsection
