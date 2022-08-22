@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Email Templates List</strong>
                <div class="float-right">
                    <a href="{{route('etemplate.create')}}" class="btn btn-primary">Add Template</a>
                </div>
            </div>
            <div class="card-body">
                <table id="data_table_et" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Sender Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
