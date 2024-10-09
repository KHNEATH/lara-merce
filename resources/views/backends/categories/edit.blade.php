@extends('layouts.backend')
@section('pageTitle')Edit Categories @endsection
@section('content')
    <div class="row">
        <div class="table-responsive pt-3">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="font-size: 21px;">Edit Food Form</h4>
                        <form action="{{ route('backends.categories.update', $category) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label" style="font-size: 20px;">Title     : </label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{ $category->title }}" class="form-control border-info" id="title" placeholder="Title" require>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="icon" class="col-sm-2 col-form-label" style="font-size: 20px;">Icon : </label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control border-info" id="icon" name="icon" accept="icon/png, icon/jpg, icon/webp, icon/svg">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8 col-form-label">
                                    <span>Keep it blank if you do not want to change icon !</span>
                                    <h5 class="mt-3">Selected icon</h5>
                                </div>
                                <div class="col-sm-4">
                                    <img src="{{ asset($category->icon)}} " style="width: 140px; height: auto;">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2 mt-4">Update</button>
                        </form>
                        <a href="{{ route('backends.categories.index') }}" class="btn btn-light mt-4">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection