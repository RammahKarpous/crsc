@extends('layouts.app')

@section('title', 'Add a meet')

@section('content')
    <div class="wrapper wrapper--narrow">
        <h1>Meets</h1>

        <a class="button button--secondary mb-10" href="{{ route('meets.index') }}" class="btn btn-primary">Back</a>
        <x-meet-form method="post" route="meets.store" />
    </div>
@endsection