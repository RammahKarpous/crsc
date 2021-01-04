<form class="form" action="{{ route($route, $method === 'put' ? $model->id : '') }}" method="post">

    <input type="hidden" name="group_id" id="group_id" value="{{ $method === 'put' ? $model->family_group_id : $model->id }}">
    
    <input type="hidden" name="email" id="email" value="{{ $model->email }}">
    <input type="hidden" name="family_name" id="family_name" value="{{ $model->family_name }}">

    <div class="col-2 my-20">
        <div class="form__group">
            <label class="form__label" for="member_type_id">Member type</label>
            <select class="form__input form__input--select" name="member_type_id" id="member_type_id">
                <option {{ $method === 'put' ? '' : 'selected' }} disabled>Please select a member type</option>

                @foreach ($member_types as $type)
                    <option {{ $type->id === $model->member_type_id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->type }}</option>            
                @endforeach
            </select>
        </div>

        <div class="form__group">
            <label class="form__label" for="name">Name</label>
            <input class="form__input form__input--text" type="text" name="name" id="name" value="{{ $method === 'put' ? $model->name : '' }}">
            @error('name') {{ $message }} @enderror
        </div>
    </div>
    
    <div class="col-3 my-20">
        <div class="form__group">
            <label>Gender</label>
        
            <div class="col-2 mt-12">
                <div class="form__group">
                    <input class="form__radio-button" {{ $model->gender == 'male' ? 'checked' : '' }} type="radio" name="gender" id="male" value="male">
                    <label class="form__label" for="male">Male</label>
                </div>

                <div class="form__group">
                    <input class="form__radio-button" {{ $model->gender == 'female' ? 'checked' : '' }} type="radio" name="gender" id="female" value="female">
                    <label class="form__label" for="female">Female</label>
                </div>

                @error('gender') {{ $message }} @enderror
            </div>
        </div>
        
        <div class="col-2 gcol-2-3">
            <div class="form__group gcol-1">
                <label class="form__label" for="dob">Date of Birth</label>
                <input class="form form__input--date" type="date" name="dob" id="dob" value="{{ $method === 'put' ? date('Y-m-d', strtotime($model->dob)) : '' }}">
                @error('dob') {{ $message }} @enderror
            </div>
            
            <div class="form__group">
                <label class="form__label" for="group_id">Status</label>
                <select  class="form__input form__input--select" name="status_id" id="status_id">
                    <option {{ $method === 'put' ? '' : 'selected' }} disabled>Please select a status</option>        

                    @foreach ($statuses as $status)
                        <option {{ $status->id === $model->status_id ? 'selected' : '' }} value="{{ $status->id }}">{{ $status->status }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    @if ($method === 'put')
        @method('PATCH')
    @endif

    @csrf
    <input type="submit" class="button button--primary" value="{{ $method === 'put' ? 'update' : 'add' }} Member">
</form>