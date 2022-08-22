@extends('layouts.app')
@section('content')
<section class="contact-section mrt-100 mrb-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="signup-content lform">
                    <div class="signup-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="login-form" id="login-form" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label for="email"><i class="far fa-envelope"></i></label>
                                <input type="email" name="email" id="email" required placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-lock"></i></label>
                                <input type="password" name="password" required id="password" placeholder="Password">
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" value="submit" name class="btn-main">
                                    <span>Login</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('webc/assets/images/login-img.webp')}}" alt="login-img"></figure>
                        <a href="{{route('register')}}" class="signup-image-link">Sign up here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection