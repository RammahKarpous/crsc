@extends('layouts.app')

@section('title', 'Add Swimmers to ' . $event->slug)

@section('content')
    <div class="wrapper wrapper--narrow">
        <a href="{{ url()->previous() }}" class="button button--secondary">Back</a>

        <div class="page-title-with-buttons">
            <h1>Add swimmers</h1>
            <h4>event: {{ $event->slug }}</h4>
        </div>
    
        @if($swimmers)
            <form class="form" action="{{ route('events.attach-swimmers') }}" method="GET">
                <input type="hidden" name="slug" value="{{ $event->slug }}">
                
                @foreach ($swimmers as $swimmer)
                    <div class="col-4 flex--center my-20">
                        <div class="form__group">
                            <input 
                                type="checkbox" class="is-participating" 
                                name="is-participating[]" {{ $swimmer->event_id ? 'checked' : '' }} 
                                id="{{ $swimmer->slug }}" 
                                value="{{ $swimmer->id }}"
                                />

                            <label for="{{ $swimmer->slug }}">{{ $swimmer->name }} {{ $swimmer->family_group->family_name }}</label>
                        </div>

                        <input type="hidden" name="event_id" value="{{ $event->id }}">

                        <div class="form__group">
                            <select class="form__input form__input--select lane-number" name="lane-number">
                                <option value="null">Select lane number</option>
                                @for ($i = 1; $i < 9; $i++)
                                    <option {{ $swimmer->lane == $i ? 'selected' : '' }} value="{{ $i }}">Lane {{ $i }}</option>
                                @endfor
                            </select>

                            <input type="checkbox" class="selected-lane hidden-element" name="selected-lane[]" value="">
                        </div>
                    </div>
                @endforeach

                <input type="submit" class="button button--primary" value="Assign students">
            </form>
        @endif
    </div>
@endsection