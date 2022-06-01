@extends('master.master')

@section('title', 'Login')

@section('content')

<div class="preloader d-flex align-items-center justify-content-center" id="preloader">

    {{-- <div class="spinner-grow text-primary" role="status">
      <div class="sr-only">Loading...</div>
    </div>
  </div> --}}


  <!-- Internet Connection Status -->
  <!-- # This code for showing internet connection status -->
  <div class="internet-connection-status" id="internetStatus"></div>
  <!-- Back Button -->
  <div class="login-back-button"><a href="element-hero-blocks.html">
      <svg class="bi bi-arrow-left-short" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
      </svg></a></div>
  <!-- Login Wrapper Area -->
  <div class="login-wrapper d-flex align-items-center justify-content-center">
    <div class="custom-container">
      <div class="text-center px-4"><img class="login-intro-img" src="{{ asset('assets/img/bg-img/36.png') }}" alt=""></div>
      <!-- Register Form -->
      <div class="register-form mt-4">
        <h6 class="mb-3 text-center">Log in to continue to Affan.</h6>
        <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="form-group">
              <x-jet-label for="email" value="{{ __('Email') }}" />
               <x-jet-input class="form-control" type="text" placeholder="Username" id="email" type="email" name="email" :value="old('email')" required autofocus/>
          </div>

          @error('username')

          <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{$message}}
          </div>

          @enderror

          <div class="form-group">
              <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password"/>
          </div>

          @error('password')

          <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{$message}}
          </div>

          @enderror

          <button href="/eCommerce/public/Requests" class="btn btn-primary w-100" type="submit">{{ __('Log in') }}</button>
        </form>
      </div>
      <!-- Login Meta -->

    </div>
  </div>

  <!-- All JavaScript Files -->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/internet-status.js') }}"></script>
  <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/js/wow.min.js') }} "></script>
  <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
  <script src=".{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/js/dark-mode-switch.js') }}"></script>
  <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/active.js') }}"></script>
  <!-- PWA -->
  <script src="{{ asset('assets/js/pwa.js') }} "></script>

@endsection
