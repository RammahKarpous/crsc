@extends('layouts.app')

@section('content')
    <h1>Update family: {{ $group->family_name }}</h1>

    <x-family-form route="family-group.update" method="put" :model="$group" />
@endsection