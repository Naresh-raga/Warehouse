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
            <form action="{{ route('reset.password.post') }}" method="POST">
               @csrf
               <input type="hidden" name="token" value="{{ $token }}">
               <div class="form-group">
               <label>Email address</label>
                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                  @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
               </div>
               <div class="form-group">
               <label>Password</label>
                  <input type="password" id="password" class="form-control" name="password" required autofocus>
                  @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
               </div>
               <div class="form-group">
               <label>Confirm password</label>
                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                  @if ($errors->has('password_confirmation'))
                  <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                  @endif
               </div>
               <button type="submit" class="btn btn-primary btn-flat m-b-15">Reset Password</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection