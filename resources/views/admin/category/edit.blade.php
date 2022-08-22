@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
          Category
            <div class="float-right">
                <a href="{{route('category.index')}}" class="btn btn-danger">Back</a>
            </div>
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('category.update' , [$attribute->id])}}" class="" enctype="multipart/form-data">
          @method('PUT')
          @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                <label for="name" class=" form-control-label">Name</label>
                <input type="text" id="name" value="{{$attribute->name}}" name="name" required class="form-control">
                </div>
              </div>
              <div class="col-lg-12 ">
                <hr>
                <button type="submit" class="btn btn-lg btn-info float-right">Update</button>
              </div>
            </div>
          </form>
         </div>
      </div>
   </div>
</div>
@endsection