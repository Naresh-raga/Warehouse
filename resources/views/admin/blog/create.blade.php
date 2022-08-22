@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
            Add Blog
            <div class="float-right">
                <a href="{{route('blog.index')}}" class="btn btn-danger">Back</a>
            </div>
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('blog.store')}}" class="" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                <label for="title" class=" form-control-label">Title</label>
                <input type="text" id="title" name="title" required class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="description" class="form-control-label">Description</label>
                  <textarea id="description" name="description" required class="form-control"></textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row pp">
                    <div class="col-lg-2">
                        <img style="height:80px;width:100%" src="{{asset('no_image.jpg')}}" >
                    </div>
                    <div class="col-lg-10">
                      <div class="form-group">
                        <label for="image" class="form-control-label">Image</label>
                        <input type="file" required id="image" name="image" class="form-control">
                      </div>
                    </div>
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