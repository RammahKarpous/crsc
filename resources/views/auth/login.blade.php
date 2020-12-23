@extends('layouts.app')

@section('content')
<div class="wrapper wrapper--narrow">
    <h1 class="card-header">{{ __('Login') }}</h1>

    <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="col-2 mb-10">
            <div class="form__group">
                <label for="email" class="form__label">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form__input form__input--text" name="email" value="{{ old('email') }}">
                    @error('email')<p class="error-message" role="alert">{{ $message }}</p>@enderror
            </div>

            <div class="form__group">
                <label for="password" class="form__label">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form__input form__input--text" name="password">
                    @error('password')<p class="error-message" role="alert">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form__group mt-20">
            <button type="submit" class="button button--primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="button button__link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
</div>
@endsection
