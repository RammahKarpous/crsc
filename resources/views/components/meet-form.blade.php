<form action="{{ route($route, $method === 'put' ? $model->slug : '') }}" method="post">

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $method === 'put' ? $model->name : '' }}">
        @error('name') {{ $message }} @enderror
    </div>
    
    <div>
        <label for="venue">Venue</label>
        <input type="text" name="venue" id="venue" value="{{ $method === 'put' ? $model->venue : '' }}">
        @error('venue') {{ $message }} @enderror
    </div>

    <div>
        <label for="date">Date</label>
        <input type="date" name="date" id="date" value="{{ $method === 'put' ? date('Y-m-d', strtotime($model->date)) : '' }}">
        @error('date') {{ $message }} @enderror
    </div>
    
    <div>
        <label for="pool_length">Pool length</label>
        <input type="number" name="pool_length" id="pool_length" value="{{ $method === 'put' ? $model->pool_length : '' }}">
        @error('pool_length') {{ $message }} @enderror
    </div>

    @if ($method === 'put')
        @method('PATCH')
    @endif

    @csrf
    <input type="submit" value="{{ $method === 'put' ? 'update' : 'add' }} Meet">
</form>