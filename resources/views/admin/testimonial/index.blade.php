@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Testimonial List</strong>
                <div class="float-right">
                    <a href="{{route('testimonial.create')}}" class="btn btn-primary">Add Testimonial</a>
                </div>
            </div>
            <div class="card-body">
                <table id="data_table_testimonial" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
