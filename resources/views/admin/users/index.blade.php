@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Users List</strong>
                <div class="float-right">
                    <a href="{{route('users.create')}}" class="btn btn-primary">Add User</a>
                </div>
            </div>
            <div class="card-body">
                <table id="data_table_users" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Pincode</th>
                            <th>GST</th>
                            <th>Adhar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
