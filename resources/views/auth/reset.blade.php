{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','ورود به سامانه')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div id="login-page" class="row">
    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
        <form class="login-form" method="POST" action="/reset-password/reset">
            @csrf
        <input type="hidden" name="uid" value="{{ $user->id }}">
            <div class="row">
                <div class="pt-4 col s12">
                    <img src="{{ asset('images/logo/logo.png') }}" alt="لوگو کوله پشتی" width="100" class="m-auto flexbox">
                    <h5 class="center">{{ __('بروزرسانی رمز') }}</h5>
                    <h6 class="mt-5 center">کوله پشتی مدرسه {{ config('kolepooshti.schoolType') .  config('kolepooshti.schoolName') }}</h6>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="far fa-user prefix pt-2"></i>
                <h6 class="mt-5 text-right">  </h6>
                    {{-- <input id="email" type="text" class=" @error('text') is-invalid @enderror" name="username"
                        value="{{ old('email') }}" required autocomplete="email" autofocus> --}}
                    <label for="email" class="center-align" style="color:black;">
                        {{ $user->username }}</label><br>
                    <small class="red-text ml-10" role="alert">
                        {{ $user->fullName }}
                    </small>
                   
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="far fa-lock-alt prefix pt-2"></i>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="off">
                    <label for="password">{{ __('رمز عبور جدید') }}</label>
                    @error('password')
                    <small class="red-text ml-10" role="alert">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="input-field col s12">
                    <i class="far fa-lock-alt prefix pt-2"></i>
                    <input id="retrypassword" type="password" class="form-control @error('retrypassword') is-invalid @enderror"
                        name="password_confirmation" required autocomplete="off">
                    <label for="retrypassword">{{ __('تکرار رمز عبور جدید') }}</label>
                    @error('password_confirmation')
                    <small class="red-text ml-10" role="alert">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
            </div>
            {{-- <div class="row">
                <div class="col s12 m12 l12 ml-2 mt-1">
                    <p>
                        <label>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>مرا به‌خاطر بسپار!</span>
                        </label>
                    </p>
                </div>
            </div> --}}
            <div class="row">
                {{-- <div class="input-field col s12">
                    <button type="submit"
                        class="btn waves-effect waves-light border-round gradient-45deg-amber-amber col s12">ورود به پنل کاربری
                    </button>
                </div> --}}
                <div class="input-field col s12">
                    <button type="submit"
                        class="btn waves-effect waves-light border-round gradient-45deg-indigo-purple col s12">
                        تغییر رمز
                    </button>
                </div>
            </div>
            <div class="row">
                {{-- <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="">ورود به عنوان مهمان</a></p>
                </div> --}}
                {{-- <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small">
                        <a href="">فراموشی رمزعبور؟</a>
                    </p>
                </div> --}}
            </div>
        </form>
    </div>
</div>
@endsection