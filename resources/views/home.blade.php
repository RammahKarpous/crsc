@extends('layouts.app')

@section('person-name')
    <h2 class="heading heading--section">{{ Auth::user()->name }} @if(Auth::user()->family_group_id) {{ Auth::user()->family_group->family_name }} @endif</h2>
@endsection

@section('content')
<div class="wrapper">

    @if (Auth::user()->member_type_id === 1)
        <x-parent-view />
    @endif

    @if (Auth::user()->member_type_id === 2)
        <x-swimmer-view />
    @endif

    @if (Auth::user()->member_type_id === 3)
        <x-admin-view />
    @endif
</div>
@endsection
