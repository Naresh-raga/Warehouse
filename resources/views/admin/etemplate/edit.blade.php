@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
            Edit Template
            <div class="float-right">
                <a href="{{route('etemplate.index')}}" class="btn btn-danger">Back</a>
            </div>
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('etemplate.update' , [$attribute->id])}}" class="" enctype="multipart/form-data">
          @method('PUT')
          @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                <label for="title" class=" form-control-label">Title</label>
                <input type="text" id="title" value="{{$attribute->title}}" name="title" required class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="subject" class=" form-control-label">Subject</label>
                <input type="text" id="subject" value="{{$attribute->subject}}" name="subject" required class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="sender_email" class=" form-control-label">Sender Email</label>
                <input type="email" id="sender_email" value="{{$attribute->sender_email}}" name="sender_email" required class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="description" class="form-control-label">Description</label>
                <textarea id="description" name="description" required class="form-control">{{$attribute->description}}</textarea>
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