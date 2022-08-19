@extends('adminlte::auth.login')

@section('title', 'Login')

@if($errors->has('login'))
@section('auth_header')
<span class="text-danger">{{ $errors->first('login') }}</span>
@stop
@else
@section('auth_header', __('adminlte::adminlte.login_message'))
@endif

@section('auth_body')
<form action="{{ route('auth') }}" method="POST">
    @csrf

    {{-- Email field --}}
    <div class="input-group mb-3">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- Password field --}}
    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
            placeholder="{{ __('adminlte::adminlte.password') }}">

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- Login field --}}
    <div class="row">
        <div class="col-7">
            <div class="icheck-success" title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label for="remember">
                    {{ __('adminlte::adminlte.remember_me') }}
                </label>
            </div>
        </div>

        <div class="col-5">
            <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                <span class="fas fa-sign-in-alt"></span>
                {{ __('adminlte::adminlte.sign_in') }}
            </button>
        </div>
    </div>
</form>
@stop

@section('auth_footer')
<div class="text-center">
    <strong>
        &copy; 2022{{ date('Y') > 2022 ? ' - '.date('Y') : '' }} by <a href="http://github.com/arifnd">arifnd</a><br/>
    </strong>
    Version 0.1.0
</div>
@stop

@section('plugins.icheckBootstrap', true)