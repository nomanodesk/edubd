@extends('layouts.registerlayout')

@section('content')

<div class="row flex-grow">
    <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left p-5">
            <div class="brand-logo">
                <img src="{{asset('admin/images/logo.svg')}}" alt="logo">
            </div>
            <h4>New here?</h4>
            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>


            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input id="name" type="text" class="form-control form-control-lg" name="name" placeholder="Institute Short Name(like DCGPSC)" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-lg" name="email" placeholder="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="password" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" placeholder="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                        {{ __('Register') }}
                    </button>

                </div>
                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                </div>
                </form>
            
        </div>
    </div>
</div>
@endsection