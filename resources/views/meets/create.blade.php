@extends('layouts.app')

@section('title', 'Add a meet')

@section('content')
    <h1>Meets</h1>

    <a href="{{ route('meets.index') }}" class="btn btn-primary">Back</a>
    <x-meet-form method="post" route="meets.store" />
@endsection