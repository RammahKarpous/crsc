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
            <form class="form" action="">
                @foreach ($swimmers as $swimmer)
                    <div class="form__group">
                        <input type="checkbox" name="is-participating" id="is-participating" value="{{ $swimmer->name }}">
                        <label for="is-participating">{{ $swimmer->name }} {{ $swimmer->family_group->family_name }}</label>
                    </div>

                    <div class="form__group">
                        <input type="hidden" name="swimmer-name" id="swimmer-name" value="{{ $swimmer->name }}">
                    </div>

                    <div class="form__group">
                        <select name="lane-number" id="lane-number">
                            <option value="null">Select lane number</option>
                            @for ($i = 1; $i < 9; $i++)
                                {{-- @if ($event->pivot->lane === $i) --}}
                                    
                                {{-- @else --}}
                                    <option value="{{ $i }}">Lane {{ $i }}</option>
                                {{-- @endif --}}
                            @endfor
                        </select>
                    </div>
                @endforeach

                <input type="submit" class="button button--primary" value="Assign students">
            </form>
        @endif
    </div>
@endsection