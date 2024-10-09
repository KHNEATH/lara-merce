@extends('layouts.backend')
@section('pageTitle')Categories @endsection
@section('content')
    <div class="row">
        <div class="table-responsive pt-3">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="font-size: 21px;">Food Form</h4>
                        <form action="{{ route('backends.categories.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label" style="font-size: 20px;">Title     : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control border-info" id="title" placeholder="Title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="icon" class="col-sm-2 col-form-label" style="font-size: 20px;">Image*</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control border-info" id="icon" name="icon" accept="image/png, image/jpg, image/webp, image/svg" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                        <a href="{{ route('backends.categories.index') }}" class="btn btn-light mt-4">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
