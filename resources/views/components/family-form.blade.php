<form class="form" action="{{ route($route, $method === 'put' ? $model->slug : '') }}" method="post">
    
    <div class="col-4">
        <div class="form__group">
            <label class="form__label" for="family_name">Family name</label>
            <input class="form__input form__input--text" type="text" name="family_name" id="family_name" value="{{ $method === 'put' ? $model->family_name : '' }}">
            @error('family_name') {{ $message }} @enderror
        </div>
    </div>
    
    <div class="col-3 my-20">
        <div class="form__group">
            <label class="form__label" for="address_line">Address line 1</label>
            <input class="form__input form__input--text" type="text" name="address_line" id="address_line" value="{{ $method === 'put' ? $model->address_line : '' }}">
            @error('address_line') {{ $message }} @enderror
        </div>
        
        <div class="form__group">
            <label class="form__label" for="place">Living place</label>
            <input class="form__input form__input--text" type="text" name="place" id="place" value="{{ $method === 'put' ? $model->place : '' }}">
            @error('place') {{ $message }} @enderror
        </div>
        
        <div class="form__group">
            <label class="form__label" for="postcode">Postcode</label>
            <input class="form__input form__input--text" type="text" pattern="[A-Z]{1}[0-9]{2} [0-9]{1}[A-Z]{2}" name="postcode" id="postcode" value="{{ $method === 'put' ? $model->postcode : '' }}">
            @error('postcode') {{ $message }} @enderror
        </div>
    </div>
    
    <div class="col-4">
        <div  class="form__group">
            <label class="form__label" for="contact_number">Contact number</label>
            <input class="form__input form__input--text" type="tel" pattern="[0-9]{2} [0-9]{9}" name="contact_number" id="contact_number" value="{{ $method === 'put' ? $model->contact_number : '' }}">
            @error('contact_number') {{ $message }} @enderror
        </div>
        
        <div  class="form__group">
            <label class="form__label" for="email">email</label>
            <input class="form__input form__input--text" type="email" name="email" id="email" value="{{ $method === 'put' ? $model->email : '' }}">
            @error('email') {{ $message }} @enderror
        </div>
    </div>

    @if ($method === 'put')
        @method('PUT')
    @endif

    @csrf
    <input type="submit" class="button button--primary mt-20" value="{{ $method === 'put' ? 'Update' : 'Add' }} group">
</form>