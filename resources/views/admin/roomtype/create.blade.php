@extends('layout')

@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">RoomType</h6>
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ url('/admin/roomtype') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <form action="{{ url('/admin/roomtype') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Title</label>
                  <input type="text" name="title" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Price</label>
                    <input type="number" name="price" required class="form-control">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Detail</label>
                <textarea name="detail" id="" cols="5" required rows="5" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                  <label for="" class="form-label">Galery</label>
                  <input type="file" name="imgs[]" multiple class="form-control">
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

</div>

@endsection