@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
          User
            <div class="float-right">
                <a href="{{route('users.index')}}" class="btn btn-danger">Back</a>
            </div>
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('users.update' , [$attribute->id])}}" class="" enctype="multipart/form-data">
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
                <label for="email" class=" form-control-label">Email*</label>
                <input type="email" id="email" value="{{$attribute->email}}" name="email" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="mobile" class=" form-control-label">Mobile*</label>
                <input type="text" id="mobile" value="{{$attribute->mobile}}" name="mobile" required class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                <label for="company_name" class=" form-control-label">Company Name</label>
                <input type="text" id="company_name" value="{{$attribute->company_name}}" name="company_name" class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="role_id" class=" form-control-label">Role*</label>
                <select id="role_id" name="role_id" class="form-control" required>
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                        <option  @php echo ($attribute->role_id == $role->id)?'selected':''; @endphp value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="address" class=" form-control-label">Address*</label>
                <input type="text" id="address" value="{{$attribute->address}}" name="address" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="state" class=" form-control-label">State*</label>
                <input type="text" id="state" name="state" value="{{$attribute->state}}" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="city" class=" form-control-label">City*</label>
                <input type="text" id="city" name="city" value="{{$attribute->city}}" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="pincode" class=" form-control-label">Pincode*</label>
                <input type="text" id="pincode" name="pincode" value="{{$attribute->pincode}}" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="pan" class=" form-control-label">PAN Number*</label>
                <input type="text" id="pan" name="pan" value="{{$attribute->pan}}" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="gst" class=" form-control-label">GST Number*</label>
                <input type="text" id="gst" name="gst" value="{{$attribute->gst}}" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="adhar" class=" form-control-label">Adhar Number*</label>
                <input type="text" id="adhar" name="adhar" value="{{$attribute->adhar}}" class="form-control" required>
                </div>
              </div>
              <input type="hidden" name="latitude" id="latitude" value="{{$attribute->latitude}}" >
              <input type="hidden" name="longitude" id="longitude" value="{{$attribute->longitude}}" >
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