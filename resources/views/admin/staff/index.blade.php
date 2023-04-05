@extends('layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customer</h6>
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ url('/admin/customer/create') }}" class="float-right btn btn-success btn-sm">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Photo</th>
                            <th>Department</th>
                            <th>Salary Type</th>
                            <th>Salary Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td><img src="{{ asset('images/'.$item->photo) }}" width="80px" alt="avatar"></td>
                            <td>{{ $item->department->title }}</td>
                            <td>{{ $item->salary_type === '0' ? 'Daily month' : 'Daily week' }}</td>
                            <td>{{ $item->salary_amt }}</td>
                            <td>
                                <a href="{{ url('admin/staff/'.$item->id).'/edit' }}" class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></a>
                                <a href="{{ url('admin/staff/'.$item->id).'/delete' }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@section('scripts')
    <link href="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <script src="{{ asset('dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('dashboard/js/demo/datatables-demo.js') }}"></script>
@endsection

@endsection