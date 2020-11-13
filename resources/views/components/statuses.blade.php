<div>
    <label for="group_id">Family group</label>
    <select name="status_id" id="status_id">
        <option>Please select a status</option>        

        @foreach ($statuses as $status)
            <option {{ $status->status === $method ? 'selected' : '' }} value="{{ $status->id }}">{{ $status->status }}</option>
        @endforeach
    </select>
</div>