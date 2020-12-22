<form class="form" action="{{ route($route, $method === 'put' ? $model->slug : '') }}" method="post">

    <div class="col-2">
        <div class="form__group">
            <label class="form__label" for="name">Name</label>
            <input class="form__input form__input--text" type="text" name="name" id="name" value="{{ $method === 'put' ? $model->name : '' }}">
            @error('name') {{ $message }} @enderror
        </div>
        
        <div>
            <label class="form__label" for="venue">Venue</label>
            <input class="form__input form__input--text" type="text" name="venue" id="venue" value="{{ $method === 'put' ? $model->venue : '' }}">
            @error('venue') {{ $message }} @enderror
        </div>
    </div>

    <div class="col-2 mt-10 mb-20">
        <div>
            <label class="form__label" for="date">Date</label>
            <input class="form__input form__input--date" type="date" name="date" id="date" value="{{ $method === 'put' ? date('Y-m-d', strtotime($model->date)) : '' }}">
            @error('date') {{ $message }} @enderror
        </div>
        
        <div>
            <label class="form__label" for="pool_length">Pool length</label>
            <input class="form__input form__input--number" type="number" name="pool_length" id="pool_length" value="{{ $method === 'put' ? $model->pool_length : '' }}">
            @error('pool_length') {{ $message }} @enderror
        </div>
    </div>

    @if ($method === 'put')
        @method('PATCH')
    @endif

    @csrf
    <input class="button button--primary" type="submit" value="{{ $method === 'put' ? 'update' : 'add' }} Meet">
</form>