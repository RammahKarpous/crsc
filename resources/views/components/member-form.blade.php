<form action="{{ route($route, $method === 'put' ? $model->id : '') }}" method="post">

    <input type="hidden" name="group_id" id="group_id" value="{{ $method === 'put' ? $model->family_group_id : $model->id }}">

    <div>
        <label for="member_type_id">Member type</label>
        <select name="member_type_id" id="member_type_id">
            <option {{ $method === 'put' ? '' : 'selected' }} disabled>Member type</option>

            @foreach ($member_types as $type)
                <option {{ $type->id === $model->member_type_id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->type }}</option>            
            @endforeach
        </select>
    </div>

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $method === 'put' ? $model->name : '' }}">
        @error('name') {{ $message }} @enderror
    </div>
    
    <div>
        <label for="gender">Gender</label>
        <input type="text" name="gender" id="gender" value="{{ $method === 'put' ? $model->gender : '' }}">
        @error('gender') {{ $message }} @enderror
    </div>
    
    <div>
        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" id="dob" value="{{ $method === 'put' ? date('Y-m-d', strtotime($model->dob)) : '' }}">
        @error('dob') {{ $message }} @enderror
    </div>
    
    <div>
        <label for="group_id">Status</label>
        <select name="status_id" id="status_id">
            <option {{ $method === 'put' ? '' : 'selected' }} disabled>Please select a status</option>        

            @foreach ($statuses as $status)
                <option {{ $status->id === $model->status_id ? 'selected' : '' }} value="{{ $status->id }}">{{ $status->status }}</option>
            @endforeach
        </select>
    </div>

    @if ($method === 'put')
        @method('PATCH')
    @endif

    @csrf
    <input type="submit" value="{{ $method === 'put' ? 'update' : 'add' }} Member">
</form>