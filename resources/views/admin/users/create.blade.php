@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
           Users
            <div class="float-right">
                <a href="{{route('users.index')}}" class="btn btn-danger">Back</a>
            </div>
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('users.store')}}" class="" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                <label for="name" class=" form-control-label">Name*</label>
                <input type="text" id="name" name="name" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="email" class=" form-control-label">Email*</label>
                <input type="email" id="email" name="email" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="password" class=" form-control-label">Password*</label>
                <input type="password" id="password" name="password" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="mobile" class=" form-control-label">Mobile*</label>
                <input type="text" id="mobile" name="mobile" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="company_name" class=" form-control-label">Company Name</label>
                <input type="text" id="company_name" name="company_name" class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="role_id" class=" form-control-label">Role*</label>
                <select id="role_id" name="role_id" class="form-control" required>
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="address" class=" form-control-label">Address*</label>
                <input type="text" id="address" name="address" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="state" class=" form-control-label">State*</label>
                <input type="text" id="state" name="state" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="city" class=" form-control-label">City*</label>
                <input type="text" id="city" name="city" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="pincode" class=" form-control-label">Pincode*</label>
                <input type="text" id="pincode" name="pincode" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="pan" class=" form-control-label">PAN Number*</label>
                <input type="text" id="pan" name="pan" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="gst" class=" form-control-label">GST Number*</label>
                <input type="text" id="gst" name="gst" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="adhar" class=" form-control-label">Adhar Number*</label>
                <input type="text" id="adhar" name="adhar" class="form-control" required>
                </div>
              </div>
              <input type="hidden" name="latitude" id="latitude" >
              <input type="hidden" name="longitude" id="longitude" >
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