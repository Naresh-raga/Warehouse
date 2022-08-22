@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Product Types List</strong>
                <div class="float-right">
                    <a href="{{route('product-types.create')}}" class="btn btn-primary">Add Product Types</a>
                </div>
            </div>
            <div class="card-body">
                <table id="data_table_pt" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Type</th>
                            <th>Rate(INR)</th>
                            <th>Wt. Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
