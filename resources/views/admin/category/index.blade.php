@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Category List</strong>
                <div class="float-right">
                    <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a>
                </div>
            </div>
            <div class="card-body">
                <table id="data_table_cat" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
