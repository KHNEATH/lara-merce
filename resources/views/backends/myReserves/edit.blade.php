@extends('layouts.backend')
@section('pageTitle')Table @endsection
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="table-responsive pt-3 ps-3 pe-3">
                    <table class="table table-striped project-orders-table">
                        <thead>
                            <div class="d-flex justify-content-between">
                                <div class="mb-4">
                                    <p class="btn btn-primary btn-sm btn-icon-text mr-3 fs-5">
                                        Reservations                    
                                    </p>
                                </div>
                            </div>
                        </thead>
                        <form action="{{ route('backends.myReserves.update', $reserve) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <tbody>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input value="{{ $reserve->phone_number }}" name="phone_number" type="text" class="form-control" id="phone" placeholder="Phone Number" required>
                                        <label for="phone">Phone Number*</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <select name="num_table" class="form-select" id="select1" required>
                                            <option selected>Select Number Of Tables*</option>
                                            @foreach ($availableTables as $tableCount)
                                                <option value="{{ $tableCount }}" @if ($reserve->num_table == $tableCount) selected @endif>{{ $tableCount }}</option>
                                            @endforeach
                                        </select>
                                        <label for="select1">Number Of Tables*</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <select name="num_guests" class="form-select" id="select1" required>
                                            <option selected for="select1">Select Number Of Guests*</option>
                                                @foreach ($numGuests as $guestCount)
                                                    <option value="{{ $guestCount }}" @if($reserve->num_guests == $guestCount) selected @endif>{{ $guestCount }}</option>
                                                @endforeach
                                        </select>
                                        <label for="phone">Number Of Guest*</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input value="{{ $reserve->date }}" name="date" type="date" class="form-control" id="date" placeholder="Your date" required>
                                        <label for="date">Your date*</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input value="{{ $reserve->start_time }}" name="start_time" type="time" class="form-control" id="start_time" placeholder="Your start time" required>
                                        <label for="start_time">Start Time*</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input value="{{ $reserve->end_time }}" name="end_time" type="time" class="form-control" id="end_time" placeholder="Your end time" required>
                                        <label for="end_time">End Time*</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <textarea name="special_req" class="form-control" placeholder="Special Request" id="message" style="height: 100px">{{ $reserve->special_req}}</textarea>
                                        <label for="message">Special Request</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </tbody>
                        </form>
                        <div class="col-md-6">
                            <div class="col-sm-12">
                                <a href="{{ route('backends.myReserves.index') }}" class="btn btn-outline-secondary mt-3">Cancel</a>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>