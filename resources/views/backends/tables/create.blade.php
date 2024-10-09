@extends('layouts.backend')
@section('pageTitle')Tables @endsection
@section('content')
    <div class="col-12">
        <div class="mb-4 mt-4">
            <h4 class="card-title" style="font-size: 21px;"><span class="bg-primary p-2 rounded-3">Add New Table</span></h4>
        </div>
        <form action="{{ route('backends.tables.store') }}" class="forms-sample" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="name" class="col-sm-10 col-form-label" style="font-size: 20px;">Table Name<span class="text-danger"> *</span>     : </label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control border-info" id="name" placeholder="Name" required>
                        </div>
                        <label for="unit_price" class="col-sm-10 col-form-label" style="font-size: 20px;">Unit Price<span class="text-danger"> *</span>     : </label>
                        <div class="col-sm-10">
                            <input type="text" name="unit_price" class="form-control border-info" id="unit_price" placeholder="Unit Price" required>
                        </div>
                        <label for="description" class="col-sm-10 col-form-label" style="font-size: 20px;">Description     : </label>
                        <div class="col-sm-10">
                            <textarea type="text" name="description" class="form-control border-info" id="description" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="image" class="col-sm-6 col-form-label">Image<span class="text-danger"> *</span></label>
                    <input type="file" class="col-sm-6 form-control border-info" id="image" name="image" accept="image/jpg, image/png, image/webp, image/svg" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </div>  
        </form>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('backends.tables.index') }}" class="btn btn-outline-secondary mt-3">Cancel</a>
            </div>
        </div> 
    </div>
@endsection