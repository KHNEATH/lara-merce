@extends('layouts.backend')
@section('pageTitle')Table @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive pt-3 ps-3 pe-3">
                    <div class="d-flex justify-content-between mb-3">
                        <p class="btn btn-primary btn-sm btn-icon-text mr-3 fs-5">
                            Reservations                    
                        </p>
                    </div>
                    <table class="table table-bordered border-dark border-opacity-10">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" style="width: 2px">Nº</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Num-Tables</th>
                                <th class="text-center">Num-Guests</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Check-in</th>
                                <th class="text-center">Check-out</th>
                                <th class="text-center">Suggest</th>
                                <th class="text-center" style="width: 50px">Status</th>
                                <th class="text-center" style="width: 50px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($bookings->isEmpty())
                                <tr>
                                    <td colspan="11">There is not recode</td>
                                </tr>
                            @else
                                @foreach($bookings as $booking)
                                <tr class="table border-opacity-10">
                                    <td class="text-center pe-0 ps-0">
                                        {{ $loop->index+1 }}
                                    </td>
                                    <td class="text-center">
                                        {{ $booking->user ? $booking->user->email : "User Not Found" }}
                                    </td>
                                    <td class="text-center">{{ $booking->phone_number }}</td>
                                    <td class="text-center">{{ $booking->num_table }}</td>
                                    <td class="text-center">{{ $booking->num_guests }}</td>
                                    <td class="text-center">{{ $booking->date }}</td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}</td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}</td>
                                    <td class="text-center">{{ $booking->special_req }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="" class="btn btn-primary btn-sm btn-icon-text mr-3 hidden-button">
                                                Pending
                                                <i class="typcn typcn-edit btn-icon-append"></i>                          
                                            </a>
                                            <a onclick="deleteCategory( '' )" type="button" class="btn btn-success btn-sm btn-icon-text" style="display: none;">
                                                Confirmed
                                                <i class="fa-regular fa-circle-check"></i>
                                            </a>
                                            <form id="" action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <script>
                                                function deleteCategory(id) {
                                                    if(confirm('Are you sure ?')){
                                                        document.getElementById('frmCategory' + id).submit();
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('backends.booking.edit', $booking) }}" class="btn btn-warning btn-sm btn-icon-text mr-3">
                                                Edit
                                                <i class="typcn typcn-edit btn-icon-append"></i>                          
                                            </a>
                                            <a onclick="deleteBooking( '{{ $booking->id }}' )" type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                Delete
                                                <i class="fa-regular fa-trash-can"></i>
                                            </a>
                                            <form id="frmBooking{{ $booking->id}}" action="{{ route('backends.booking.destroy', $booking) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <script>
                                                function deleteBooking(id) {
                                                    if(confirm('Are you sure ?')){
                                                        document.getElementById('frmBooking' + id).submit();
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>