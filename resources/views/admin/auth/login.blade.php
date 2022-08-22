@extends('admin.layouts.login')
@section('content')
<div class="sufee-login d-flex align-content-center flex-wrap">
   <div class="container">
      <div class="login-content">
         <div class="login-logo">
            <a href="{{url('/')}}">
            <img class="align-content"  src="{{asset('logolse.png') }}" alt="">
            </a>
         </div>
         <div class="login-form">
            <form method="POST" action="{{ route('admin.login') }}">
               @csrf
               <div class="form-group">
                  <label>Email address</label>
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                  <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                  <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
               </div>
               <div class="checkbox">
                  <!-- <label>
                  <input type="checkbox"> Remember Me
                  </label> -->
                  <label class="pull-right">
                  <a href="{{route('forget.password.get')}}">Forgotten Password?</a>
                  </label>
               </div>
               <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
               <!-- <div class="social-login-content">
                  <div class="social-button">
                     <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                     <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                  </div>
               </div>
               <div class="register-link m-t-15 text-center">
                  <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
               </div> -->
            </form>
         </div>
      </div>
   </div>
</div>
@endsection