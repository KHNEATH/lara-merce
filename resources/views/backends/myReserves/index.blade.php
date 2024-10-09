@extends('layouts.backend')
@section('pageTitle')
    personal-info
@endsection
@section('content')
@if (Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">
    {{ Session::get('message') }}
</p>
@endif

@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive pt-3 ps-3 pe-3">
                    <table class="table table-bordered border-dark border-opacity-10">
                        <thead class="table-dark">
                            <div class="d-flex justify-content-between">
                                <div class="mb-4">
                                    <p class="btn btn-primary btn-sm btn-icon-text mr-3 fs-5">
                                        Reservations
                                    </p>
                                </div>
                            </div>
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
                            @if ($myReserves->isEmpty())
                                <tr>
                                    <td colspan="11">There is not recode</td>
                                </tr>
                            @else
                                @foreach ($myReserves as $reserve)
                                    <tr class="table border-opacity-10">
                                        <td class="text-center pe-0 ps-0">
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td class="text-center">
                                            {{ $reserve->user ? $reserve->user->email : 'User Not Found' }}
                                        </td>
                                        <td class="text-center">{{ $reserve->phone_number }}</td>
                                        <td class="text-center">{{ $reserve->num_table }}</td>
                                        <td class="text-center">{{ $reserve->num_guests }}</td>
                                        <td class="text-center">{{ $reserve->date }}</td>
                                        <td class="text-center">
                                            {{ Carbon\Carbon::parse($reserve->start_time)->format('h:i A') }}</td>
                                        <td class="text-center">
                                            {{ Carbon\Carbon::parse($reserve->end_time)->format('h:i A') }}</td>
                                        <td class="text-center">{{ $reserve->special_req }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href=""
                                                    class="btn btn-primary btn-sm btn-icon-text mr-3 hidden-button">
                                                    Pending
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </a>
                                                <a onclick="deleteCategory( '' )" type="button"
                                                    class="btn btn-success btn-sm btn-icon-text" style="display: none;">
                                                    Confirmed
                                                    <i class="fa-regular fa-circle-check"></i>
                                                </a>
                                                <form id="" action="" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <script>
                                                    function deleteCategory(id) {
                                                        if (confirm('Are you sure ?')) {
                                                            document.getElementById('frmCategory' + id).submit();
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('backends.myReserves.edit', $reserve) }}"
                                                    class="btn btn-warning btn-sm btn-icon-text mr-3">
                                                    Edit
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </a>
                                                <a onclick="deleteReserve( '{{ $reserve->id }}' )" type="button"
                                                    class="btn btn-danger btn-sm btn-icon-text">
                                                    Delete
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </a>
                                                <form id="frmReserve{{ $reserve->id }}"
                                                    action="{{ route('backends.myReserves.delete', $reserve) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <script>
                                                    function deleteReserve(id) {
                                                        if (confirm('Are you sure ?')) {
                                                            document.getElementById('frmReserve' + id).submit();
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
