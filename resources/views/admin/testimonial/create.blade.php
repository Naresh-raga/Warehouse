@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
            Add Testimonial
            <div class="float-right">
                <a href="{{route('testimonial.index')}}" class="btn btn-danger">Back</a>
            </div>
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('testimonial.store')}}" class="" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                <label for="title" class=" form-control-label">Title</label>
                <input type="text" id="title" name="title" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="author" class=" form-control-label">Author</label>
                <input type="text" id="author" name="author" required class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="description" class="form-control-label">Description</label>
                <textarea id="description" name="description" required class="form-control"></textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="author_image" class="form-control-label">Author Image</label>
                <input type="file" id="author_image" required name="author_image" class="form-control">
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