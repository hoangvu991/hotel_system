@extends('layout')

@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Booking</h6>
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ url('/admin/booking') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <form action="{{ url('/admin/booking') }}" enctype="multipart/form-data" method="POST">
                @csrf
              
                <div class="mb-3">
                    <label for="" class="form-label">Customer</label>
                    <select name="customer_id" id="" class="form-control">
                            <option value="0">--Select--</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>           
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Checkin Date</label>
                    <input type="date" name="checkin_date" required class="form-control checkin_date">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Checkout Date</label>
                    <input type="date" name="checkout_date" required class="form-control checkout_date">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Room Avaiable</label>
                    <select name="room_id" class="form-control room-list"></select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Total Adult</label>
                    <input type="number" name="total_adults" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Total Kids</label>
                    <input type="number" name="total_children" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

</div>

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.checkin_date').on('change', function() {
                var checkin_date = $(this).val();
                $.ajax({
                    url: "{{ url('admin/booking/available/') }}/"+checkin_date,
                    dataType: 'json',
                    beforeSend: function() {
                        $('.room-list').html('<option>--Select--</option>');
                    },
                    success: function (res){
                      var _html = '';
                      $.each(res.data, function(index, row) {
                         _html += '<option value ="'+row.id+'">'+row.title+'</option>';
                      })

                      $('.room-list').html(_html);
                    }
                });
            })
        })
    </script>
@endsection
@endsection