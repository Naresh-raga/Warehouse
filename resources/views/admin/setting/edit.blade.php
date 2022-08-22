@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
            Edit Setting
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('setting.update' , [$attribute->id])}}" class="" enctype="multipart/form-data">
          @method('PUT')
          @csrf
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                <label for="email" class="form-control-label">Email</label>
                <input type="text" id="email" name="email" required class="form-control" value="<?php echo $attribute->email; ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="email" class="form-control-label">Contact Number</label>
                <input type="text" id="mobile" name="mobile" required class="form-control" value="<?php echo $attribute->mobile; ?>">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                <label for="whatsapp_number" class="form-control-label">Whatsapp Number</label>
                <input type="text" id="whatsapp_number" name="whatsapp_number" required class="form-control" value="<?php echo $attribute->whatsapp_number; ?>">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                <label for="address" class="form-control-label">Address</label>
                <textarea name="address" required class="form-control" ><?php echo $attribute->address; ?></textarea>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                <label for="fb_link" class="form-control-label">Facebook Link</label>
                <input type="text" id="fb_link" name="fb_link" required class="form-control" value="<?php echo $attribute->fb_link; ?>">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                <label for="twitter_link" class="form-control-label">Twitter Link</label>
                <input type="text" id="twitter_link" name="twitter_link" required class="form-control" value="<?php echo $attribute->twitter_link; ?>">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                <label for="google_link" class="form-control-label">Google Link</label>
                <input type="text" id="google_link" name="google_link" required class="form-control" value="<?php echo $attribute->google_link; ?>">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                <label for="instagram_link" class="form-control-label">Instagram Link</label>
                <input type="text" id="instagram_link" name="instagram_link" required class="form-control" value="<?php echo $attribute->instagram_link; ?>">
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