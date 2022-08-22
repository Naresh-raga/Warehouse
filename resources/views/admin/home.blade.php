@extends('admin.layouts.app')

@section('content')
<style>
#hero {
  width: 100%;
  height: 80vh;
  background: url("{{asset('hero-bg.png')}}") center center;
  background-size: cover;
  position: relative;
  margin-top: -40px;
  z-index: 9;
}

#hero .hero-container {
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
  padding: 0 15px;
}
</style>
<div class="row">
    <div class="col-lg-12">
    <section id="hero">
        <div class="hero-container">
        
        </div>
        </section>
        <div class="text-center mt-3">
        <h1>Welcome to WMS</h1>
        <h2>Please, feel free to reach out!</h2>
        </div>
</div>

<div class="clearfix"></div>
@endsection