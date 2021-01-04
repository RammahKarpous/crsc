<form class="form" action="{{ route($route, $method === 'put' ? $model->id : '') }}" method="post">

    <input type="hidden" name="meet_id" id="meet_id" value="{{ $method === 'put' ? $model->meet_id : $model->id }}">

    <div class="col-5 mt-10">
        <div class="form__group gcol-1-3">
            <label class="form__label" for="age_range_id">Age range</label>
            <select class="form__input form__input--select" name="age_range_id" id="age_range_id">
                <option {{ $method === 'put' ? '' : 'selected' }} disabled>Please select an age range</option>

                @foreach ($age_ranges as $age)
                    <option {{ $age->id === $model->age_range_id ? 'selected' : '' }} value="{{ $age->id }}">{{ $age->age_range }}</option>            
                @endforeach
            </select>
            @error('age_range_id') {{ $message }} @enderror
        </div>

        <div class="form__group">
            <label class="form__label" for="start_time">Start time</label>
            <input class="form__input form__input--time" type="time" id="start_time" name="start_time" min="09:00" max="18:00" value="{{ $method === 'put' ? $model->start_time : '' }}">
            @error('start_time') {{ $message }} @enderror
        </div>

        <div class="form__group">
            <label class="form__label" for="end_time">End time</label>
            <input class="form__input form__input--time" type="time" id="end_time" name="end_time" min="09:00" max="18:00" value="{{ $method === 'put' ? $model->end_time : '' }}">
            @error('end_time') {{ $message }} @enderror
        </div>
    </div>
    
    <div class="mt-10">
        <label>Gender</label>
    
        <div class="col-6">
            <div class="form__group">
                <input class="form__radio-button" type="radio" name="gender" id="male" value="male">
                <label class="form__label" for="male">Male</label>
            </div>

            <div class="form__group">
                <input class="form__radio-button" type="radio" name="gender" id="female" value="female">
                <label class="form__label" for="female">Female</label>
            </div>

            @error('gender') {{ $message }} @enderror
        </div>
    </div>



    <div class="col-3 my-10 mb-20">
        <div class="form__group">
            <label class="form__label" for="distance">Distance (max: {{ $model->pool_length }})</label>
            <input class="form__input form__input--number" type="number" name="distance" id="distance" value="{{ $method === 'put' ? $model->distance : '' }}" min="0" max="{{ $model->pool_length }}">
            @error('distance') {{ $message }} @enderror
        </div>
        
        <div class="form__group">
            <label for="stroke">Stroke</label>
            <select class="form__input form__input--select" name="stroke" id="stroke">
                <option value="front-crawl">Freestyle/Front Crawl</option>
                <option value="backstroke">Backstroke</option>
                <option value="breaststroke">Breaststroke</option>
                <option value="butterfly">Butterfly</option>
                <option value="sidestroke">Sidestroke</option>
                <option value="elementary-backstroke">Elementary Backstroke</option>
                <option value="combat-side-stroke">Combat Side Stroke</option>
                <option value="trudgen">Trudgen</option>
            </select>
            @error('stroke') {{ $message }} @enderror
        </div>
        
        <div class="form__group">
            <label  class="form__label" for="round">Round</label>
            <input  class="form__input form__input--number" type="number" name="round" id="round" value="{{ $method === 'put' ? date('Y-m-d', strtotime($model->round)) : '' }}">
            @error('round') {{ $message }} @enderror
        </div>
    </div>

    @if ($method === 'put')
        @method('PATCH')
    @endif

    @csrf
    <input type="submit" class="button button--primary" value="{{ $method === 'put' ? 'update' : 'add' }} Event">
</form>