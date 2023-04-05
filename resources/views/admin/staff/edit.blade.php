@extends('layout')

@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Staff</h6>
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ url('/admin/staff') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <form action="{{ url('/admin/staff/'.$edit->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" value="{{$edit->full_name}}" name="full_name" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Department</label>
                    <select name="department_id" id="" class="form-control">
                        <option value="">--Select--</option>
                        @foreach ($department as $item)
                            <option {{ $edit->department_id === $item->id ? 'selected' : '' }} value="{{$item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Bio</label>
                    <textarea name="bio" id="" class="form-control" cols="5" rows="5">{{$edit->bio}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Salary Type</label>
                    <select name="salary_type" id="" class="form-control">
                        <option value="">--Select--</option>
                        <option  {{ $edit->salary_type === '0' ? 'selected' : '' }} value="0">Daily month</option>
                        <option  {{ $edit->salary_type === '1' ? 'selected' : '' }} value="1">Daily week</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Salary amount</label>
                    <input type="text" name="salary_amt" value="{{$edit->salary_amt}}" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>

</div>

@endsection