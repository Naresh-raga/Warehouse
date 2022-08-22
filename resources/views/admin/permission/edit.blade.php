@extends('admin.layouts.app')
@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-12">
      <div class="card">
         <div class="card-header">
            Edit Permissions
         </div>
         <div class="card-body card-block">
          <form method="POST" action="{{route('permission.update' , [1])}}" class="" enctype="multipart/form-data">
          @method('PUT')
          @csrf
            <div class="row">
            <div class="col-lg-12 ">
              <table class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th>Role</th>
                      <th>Add</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{$role->name}}<input type="hidden" name="role_id[]" value="{{$role->id}}"></td>
                        <td><input @php echo ($role->perms && $role->perms->add == 1)?'checked':''; @endphp class="" name="add[]" type="checkbox" value="1" ></td>
                        <td><input @php echo ($role->perms && $role->perms->edit == 1)?'checked':''; @endphp class="" name="edit[]" type="checkbox" value="1" ></td>
                        <td><input @php echo ($role->perms && $role->perms->delete == 1)?'checked':''; @endphp class="" name="delete[]" type="checkbox" value="1" ></td>
                        <td><input @php echo ($role->perms && $role->perms->view == 1)?'checked':''; @endphp class="" name="view[]" type="checkbox" value="1" ></td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
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