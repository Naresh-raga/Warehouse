@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
            Edit Page
            <div class="float-right">
                <a href="{{route('cms-pages.index')}}" class="btn btn-danger">Back</a>
            </div>
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('cms-pages.update' , [$attribute->id])}}" class="" enctype="multipart/form-data">
          @method('PUT')
          @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                <label for="title" class=" form-control-label">Title</label>
                <input type="text" id="title" value="{{$attribute->title}}" name="title" required class="form-control">
                </div>
              </div>
              <!-- <div class="col-lg-6">
                <div class="form-group">
                <label for="slug" class=" form-control-label">Slug</label>
                <input type="text" id="slug" value="{{$attribute->slug}}" name="slug" <?php //echo (in_array($attribute->slug,$cm))?'readonly':''; ?> required class="form-control">
                </div>
              </div> -->
              <div class="col-lg-12">
                <div class="form-group">
                <label for="description" class="form-control-label">Description</label>
                <textarea id="description" name="description" required class="form-control">{{$attribute->description}}</textarea>
                </div>
              </div>
              <!-- <div class="col-lg-12">
                <div class="form-group">
                <label for="image" class="form-control-label">Image</label>
                <div class="row">
                    <div class="col-lg-1">
                      <img src="<?php //echo ($attribute->image!="")?url('storage/'.$attribute->image):url('storage/media/no_image.jpg'); ?>">
                    </div>
                    <div class="col-lg-11">
                      <input type="file" id="image" name="image" class="form-control">
                    </div>
                </div>
                
                </div>
              </div> -->
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