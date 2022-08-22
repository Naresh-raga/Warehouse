@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
            Add Warehouse
            <div class="float-right">
                <a href="{{route('warehouse.index')}}" class="btn btn-danger">Back</a>
            </div>
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('warehouse.store')}}" class="" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                <label for="name" class=" form-control-label">Warehouse Name</label>
                <input type="text" id="name" name="name" required class="form-control">
                </div>
              </div>
              @if (\Auth::user()->role_id == 1)
              <div class="col-lg-4">
                <div class="form-group">
                <label for="owner" class=" form-control-label">Owner</label>
                <select class="form-control" name="owner" id="owner" required>
                    @foreach($roles as $role)
                      <option value="{{$role->id}}" >{{$role->name}}</option>
                    @endforeach
                </select>
                </div>
              </div>
              @else
                <input type="hidden" name="owner" value="{{\Auth::user()->id}}">
              @endif
              <div class="col-lg-@php echo (\Auth::user()->role_id == 1)?'4':'6' ; @endphp">
                <div class="form-group">
                <label for="category" class=" form-control-label">Category</label>
                <select class="form-control" name="category" id="category" required>
                    @foreach($cats as $role)
                      <option value="{{$role->id}}" >{{$role->name}}</option>
                    @endforeach
                </select>
                </div>
              </div>
              <div class="col-lg-@php echo (\Auth::user()->role_id == 1)?'4':'6' ; @endphp">
                <div class="form-group">
                <label for="phone" class=" form-control-label">Phone</label>
                <input type="text" id="phone" name="phone" required class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="address" class=" form-control-label">Address</label>
                <input type="text" id="address" name="address" required class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="state" class=" form-control-label">State</label>
                <input type="text" id="state" name="state" required class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="city" class=" form-control-label">City</label>
                <input type="text" id="city" name="city" required class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="pincode" class=" form-control-label">Pincode</label>
                <input type="text" id="pincode" name="pincode" required class="form-control">
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