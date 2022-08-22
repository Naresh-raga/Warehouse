@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
            Edit Product Type
            <div class="float-right">
                <a href="{{route('product-types.index')}}" class="btn btn-danger">Back</a>
            </div>
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('product-types.update' , [$attribute->id])}}" class="" enctype="multipart/form-data">
          @method('PUT')
          @csrf
            <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                <label for="name" class=" form-control-label">Name</label>
                <input type="text" id="name" value="{{$attribute->name}}" name="name" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="qty" class=" form-control-label">Quantity</label>
                <input type="text" id="qty" value="{{$attribute->qty}}" name="qty" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="product_type" class=" form-control-label">Product Type</label>
                <input type="text" id="product_type" value="{{$attribute->product_type}}" name="product_type" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="rate" class=" form-control-label">Rate(INR)</label>
                <input type="text" id="rate" name="rate" value="{{$attribute->rate}}" required class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="weight_type" class=" form-control-label">Wt. Type</label>
                <input type="text" id="weight_type" value="{{$attribute->weight_type}}" name="weight_type" required class="form-control">
                </div>
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