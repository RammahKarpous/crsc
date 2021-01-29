@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <h1>Add a family group</h1>
        <a href="{{ url()->previous() }}" class="button button--secondary mb-20" id="populate">Back</a>

        <x-family-form route="family-group.store" method="post" />
    </div>
@endsection