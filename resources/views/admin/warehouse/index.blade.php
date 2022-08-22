@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Warehouse List</strong>
                <div class="float-right">
                    {{createAddButton(route('warehouse.create'),'Warehouse')}}
                </div>
            </div>
            <div class="card-body">
                <table id="data_table_wh" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Address</th>
                            <th>State</th>
                            <th>Pincode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
