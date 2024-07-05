@extends('layouts.registerlayout')

@section('content')
<div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                <img src="{{asset('admin/images/logo.png')}}" alt="logo">
                </div>
                <h4>Sign in to continue.</h4>
                <form id="login-form"class="pt-3" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="email" :value="old('email')" id="exampleInputEmail1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" required autocomplete="current-password" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="{{ route('login') }}"  onclick="event.preventDefault(); document.getElementById('login-form').submit();">SIGN IN</a>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                  </div>
                  <!-- <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
                  </div> -->
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection
