{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','ثبت نام در سامانه')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/register.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div id="register-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
    {{-- <form class="login-form" method="POST" action="{{ route('register') }}">
      @csrf --}}

      <div class="row">
        <div class="pt-4 col s12">
              <img src="{{ asset('images/logo/logo.png') }}" alt="لوگو کوله پشتی" width="100" class="m-auto flexbox">
              <h5 class="center">{{ __('ثبت نام در سامانه') }}</h5>
              <h6 class="mt-5 center">کوله پشتی مدرسه شاهد رمضانزاده</h6>
              <p class="mt-10 center red-text">متاسفانه قابلیت ثبت نام برای مدرسه شما فعال نمیباشد!</p>
        </div>
      </div>
      {{-- <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
            required autocomplete="name" autofocus>
          <label for="name" class="center-align">Username</label>
          @error('name')
          <small class="red-text ml-10" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">mail_outline</i>
          <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email">
          <label for="email">Email</label>
          @error('email')
          <small class="red-text ml-10" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required
            autocomplete="new-password">
          <label for="password">Password</label>
          @error('password')
          <small class="red-text ml-10" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password-confirm" type="password" name="password_confirmation" required
            autocomplete="new-password">
          <label for="password-confirm">Password again</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit"
            class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Register</button>
        </div>
      </div> --}}
      <div class="row">
        <div class="input-field col s12">
          <p class="medium-small center"><a href="{{ route('login')}}">اگر حساب دارید جهت ورود کلیک کنید!</a></p>
        </div>
      </div>
    {{-- </form> --}}
  </div>
</div>
@endsection