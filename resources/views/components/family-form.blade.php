<form class="form" action="{{ route($route, $method === 'put' ? $model->slug : '') }}" method="post">
    
    <div>
        <label for="family_name">Family name</label>
        <input type="text" name="family_name" id="family_name" value="{{ $method === 'put' ? $model->family_name : '' }}">
        @error('family_name') {{ $message }} @enderror
    </div>
    
    <div>
        <label for="address_line">Address line 1</label>
        <input type="text" name="address_line" id="address_line" value="{{ $method === 'put' ? $model->address_line : '' }}">
        @error('address_line') {{ $message }} @enderror
    </div>
    
    <div>
        <label for="place">Living place</label>
        <input type="text" name="place" id="place" value="{{ $method === 'put' ? $model->place : '' }}">
        @error('place') {{ $message }} @enderror
    </div>
    
    <div>
        <label for="postcode">Postcode</label>
        <input type="text" name="postcode" id="postcode" value="{{ $method === 'put' ? $model->postcode : '' }}">
        @error('postcode') {{ $message }} @enderror
    </div>
    
    <div>
        <label for="contact_number">Contact number</label>
        <input type="text" name="contact_number" id="contact_number" value="{{ $method === 'put' ? $model->contact_number : '' }}">
        @error('contact_number') {{ $message }} @enderror
    </div>
    
    <div>
        <label for="email">email</label>
        <input type="text" name="email" id="email" value="{{ $method === 'put' ? $model->email : '' }}">
        @error('email') {{ $message }} @enderror
    </div>

    @if ($method === 'put')
        @method('PUT')
    @endif

    @csrf
    <input type="submit" value="{{ $method === 'put' ? 'Update' : 'Add' }} group">
</form>