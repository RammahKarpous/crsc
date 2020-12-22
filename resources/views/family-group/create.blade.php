@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <h1>Add a family group</h1>
        <button class="btn btn-secondary" id="populate">Populate</button>

        <x-family-form route="family-group.store" method="post" />
    </div>
@endsection