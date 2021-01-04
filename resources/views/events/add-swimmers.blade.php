@extends('layouts.app')

@section('title', 'Add Swimmers to ' . $event->slug)

@section('content')
    <div class="wrapper wrapper--narrow">
        <a href="{{ route('events.show', $event->slug) }}" class="button button--secondary">Back</a>

        <div class="page-title-with-buttons">
            <h1>Add swimmers</h1>
            <h4>event: {{ $event->slug }}</h4>
        </div>
    
        @if($swimmers)
            <form class="form" action="{{ route('events.attach-swimmers') }}" method="GET">
                @foreach ($swimmers as $swimmer)
                    <div class="col-4 flex--center my-20">
                        <div class="form__group">
                            <input type="checkbox" name="is-participating[]" {{ $swimmer->event_id ? 'checked' : '' }} id="{{ $swimmer->slug }}" value="{{ $swimmer->id }}">
                            <label for="{{ $swimmer->slug }}">{{ $swimmer->name }} {{ $swimmer->family_group->family_name }}</label>
                        </div>

                        <input type="hidden" name="event_id" value="{{ $event->id }}">

                        <div class="form__group">
                            <select class="form__input form__input--select" name="lane-number" id="lane-number">
                                <option value="null">Select lane number</option>
                                @for ($i = 1; $i < 9; $i++)
                                    <option {{ $swimmer->lane == $i ? 'selected' : '' }} value="{{ $i }}">Lane {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                @endforeach

                <input type="submit" class="button button--primary" value="Assign students">
            </form>
        @endif
    </div>
@endsection