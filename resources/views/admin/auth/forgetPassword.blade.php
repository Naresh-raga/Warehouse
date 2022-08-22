@extends('admin.layouts.login')
@section('content')
<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="#">
                    <img class="align-content"  src="{{asset('logolse.png') }}" alt="">
                </a>
            </div>
            <div class="login-form">
                @if (Session::has('message'))
                  <div class="alert alert-success" role="alert">
                     {{ Session::get('message') }}
                  </div>
                @endif
                <form method="POST" action="{{ route('forget.password.post') }}">
                @csrf
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                        @if ($errors->has('email'))
                           <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-b-15">Send Password Reset Link</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
