@extends('admin.layouts.app')
@section('content')
<div class="content">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                  <strong class="card-title">Change Password</strong>
               </div>
               <div class="card-body">
                  <div id="pay-invoice">
                     <div class="card-body">
                        <div class="card-title">
                           <h3 class="text-center">Change Password</h3>
                        </div>
                        <hr>
                        <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}">
                           {{ csrf_field() }}
                           <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                              <label for="new-password" class="col-md-4 control-label">Current Password</label>
                              <div class="col-md-12">
                                 <input id="current-password" type="password" class="form-control" name="current-password" required>
                                 @if ($errors->has('current-password'))
                                 <span class="help-block">
                                 <strong>{{ $errors->first('current-password') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                              <label for="new-password" class="col-md-4 control-label">New Password</label>
                              <div class="col-md-12">
                                 <input id="new-password" type="password" class="form-control" name="new-password" required>
                                 @if ($errors->has('new-password'))
                                 <span class="help-block">
                                 <strong>{{ $errors->first('new-password') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
                              <div class="col-md-12">
                                 <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                              </div>
                           </div>
                           <div>
                              <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Change Password</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- .card -->
         </div>
         <!--/.col-->
      </div>
   </div>
</div>
<!-- .animated -->
</div><!-- .content -->
@endsection