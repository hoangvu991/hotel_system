@extends('layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">RoomType Update</h6>
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <form action="{{ url('admin/roomtype/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Title</label>
                  <input type="text" value="{{ $edit->title }}" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Price</label>
                    <input type="number" name="price" value="{{ $edit->price }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Detail</label>
                    <textarea name="detail" id="" cols="5" rows="5" class="form-control">{{ $edit->detail }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Galery</label>
                    <input type="file" name="imgs[]" multiple class="form-control">
                </div>

                <div class="mb-3" id="deletel_image">
                    <label for="" class="form-label">Galery Show</label>
                    <table class="table">
                        <tr id="result">
                            @foreach ($edit->roomtypeimages as $img)
                                <td>
                                    <img src="{{ asset('images/'.$img->img_src) }}" width="100px" alt="avatar">
                                    <br>                
                                    <button type="button" class="btn btn-danger btn-sm mt-2 delete_image" data-id = "{{ $img->id }}"><i class="fa fa-trash"></i></button>
                                </td> 
                            @endforeach
                        </tr>
                    </table>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>

</div>

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete_image').on('click', function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "{{ url('admin/roomtypeimage/delete') }}/"+id,
                    type: 'GET',
                    success: function (){
                        $( "#deletel_image" ).load("{{ url('admin/roomtype/'.$edit->id).'/edit' }} #result");
                    }
                });
            })
        })
    </script>
@endsection

@endsection