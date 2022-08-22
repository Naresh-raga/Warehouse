@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
            Update Your Profile
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('manager.update.profile')}}" class="" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                <label for="company_name" class=" form-control-label">Company Name</label>
                <input type="text" id="company_name" name="company_name" value="{{$user->company_name}}" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="mobile" class=" form-control-label">Mobile</label>
                <input type="text" id="mobile" name="mobile" value="{{$user->mobile}}" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="name" class=" form-control-label">Name</label>
                <input type="text" id="name" name="name" value="{{$user->name}}" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="name" class=" form-control-label">Email</label>
                <input type="email" id="email" name="email" readonly value="{{$user->email}}" required class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="address" class=" form-control-label">Address</label>
                <input type="text" id="address" name="address" value="{{$user->address}}" required class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="state" class=" form-control-label">State</label>
                <input type="text" id="state" name="state" value="{{$user->state}}" required class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="city" class=" form-control-label">City</label>
                <input type="text" id="city" name="city" value="{{$user->city}}" required class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="pincode" class=" form-control-label">Pincode</label>
                <input type="text" id="pincode" name="pincode" value="{{$user->pincode}}" required class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="pan" class=" form-control-label">PAN</label>
                <input type="text" id="pan" name="pan" value="{{$user->pan}}" required class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="gst" class=" form-control-label">GST</label>
                <input type="text" id="gst" name="gst" value="{{$user->gst}}" required class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="adhar" class=" form-control-label">Adhar</label>
                <input type="text" id="adhar" name="adhar" value="{{$user->adhar}}" required class="form-control">
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