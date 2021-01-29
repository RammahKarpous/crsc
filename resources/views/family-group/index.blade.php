@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="page-title-with-buttons">
            <h1>Family groups</h1>
            <a class="button button--primary" href="{{ route('family-group.create') }}">Add a family group</a>
        </div>

        <div class="table">
            <div class="row-6">
                <p>Family name</p>
                <p>Address line</p>
                <p>Postcode</p>
                <p>Place</p>
            </div>
        </div>

        <div class="table">
            @foreach ($groups as $group)
                <div class="row row-6">
                    <p>{{ $group->family_name }}</p>
                    <p>{{ $group->address_line }}</p>
                    <p>{{ $group->place }}</p>
                    <p>{{ $group->postcode }}</p>

                    <div class="row-2 gcol-5-7 gap-10 bg-light-gray">
                        <a class="button button--primary" href="{{ route('family-group.show', $group->slug) }}">View members</a>
                        <a href="{{ route('family-group.edit', $group->slug) }}" class="button button--secondary" id="update-details">Update details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection