@extends('layout')

@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room</h6>
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ url('/admin/room') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <form action="{{ url('/admin/room') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Room Type</label>
                  <select name="room_type_id" id="" class="form-control">
                        <option value="0">--Select--</option>
                    @foreach ($roomType as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>           
                    @endforeach
                  </select>
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

</div>

@endsection