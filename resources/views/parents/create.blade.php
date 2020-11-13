@extends('layouts.app')

@section('content')
    <h1>Add member to family: {{ $group->family_name }}</h1>

    <x-member-form method="post" :model="$group" route="parents.store" />
@endsection