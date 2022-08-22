@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
           Roles
            <div class="float-right">
                <a href="{{route('roles.index')}}" class="btn btn-danger">Back</a>
            </div>
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('roles.store')}}" class="" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                <label for="name" class=" form-control-label">Name</label>
                <input type="text" id="name" name="name" required class="form-control">
                </div>
              </div>
              <div class="col-lg-12 ">
                <hr>
                <button type="submit" class="btn btn-lg btn-info float-right">Save</button>
              </div>
            </div>
          </form>
         </div>
      </div>
   </div>
</div>
@endsection