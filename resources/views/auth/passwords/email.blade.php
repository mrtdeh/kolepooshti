{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','بازیابی رمز عبور')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/forgot.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div id="forgot-password" class="row">
  <div class="col s12 m6 l4 z-depth-4 offset-m4 card-panel border-radius-6 forgot-card bg-opacity-8">
    {{-- success status --}}
    @if (session('status'))
    <div class="card-alert card green lighten-5">
      <div class="card-content green-text">
        <p>{{ session('status') }}</p>
      </div>
      <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    @endif
    <form class="login-form" method="POST" action="{{ route('password.email') }}">
      @csrf

      <div class="row">
        <div class="pt-4 col s12">
            <img src="{{ asset('images/logo/logo.png') }}" alt="لوگو کوله پشتی" width="100" class="m-auto flexbox">
            <h5 class="center">{{ __('بازیابی رمز عبور') }}</h5>
            <h6 class=" mt-5    center">کوله پشتی مدرسه شاهد رمضانزاد{{ config('kolepooshti.schoolType') .  config('kolepooshti.schoolName') }}</h6>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="far fa-phone prefix pt-2"></i>
          <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
            value="{{ old('phone') }}" required autocomplete="phone" autofocus>
          <label for="phone" class="center-align">شماره موبایل</label>
          @error('email')
          <span class="red-text ml-10" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit"
            class="btn waves-effect waves-light border-round gradient-45deg-indigo-purple col s12 mb-1">ارسال پیام</button>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m12 l12">
          <p class="margin medium-small center"><a href="{{ route('login')}}">بازگشت به ورود</a></p>
        </div>
        {{-- <div class="input-field col s6 m6 l6">
          <p class="margin right-align medium-small"><a href="{{route('register')}}">Register</a></p>
        </div> --}}
      </div>
    </form>
  </div>
</div>
@endsection


{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
@endsection