@extends('layout')

@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customer</h6>
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ url('/admin/customer') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <form action="{{ url('/admin/customer/'.$edit->id) }}" enctype="multipart/form-data" method="POST">
                @csrf

                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" name="full_name" value="{{ $edit->full_name }}" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" name="email" value="{{ $edit->email }}" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mobile</label>
                    <input type="text" name="mobile" value="{{ $edit->mobile }}" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" name="address" value="{{ $edit->address }}" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

</div>

@endsection