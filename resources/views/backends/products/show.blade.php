@extends('layouts.backend')
@section('pageTitle')Detail Products @endsection
@section('content')
    <div class="col-12">
        <h4 class="card-title" style="font-size: 21px;">Detail Product</h4>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="category_id" class="col-sm-10 col-form-label" style="font-size: 20px;">Category*     : </label>
                        <div class="col-sm-10">
                            <input value="{{ $product->category->title}}" type="text" name="category_id" class="form-control border-info" id="category_id" readonly required>
                        </div>

                        <label for="name" class="col-sm-10 col-form-label" style="font-size: 20px;">Name*     : </label>
                        <div class="col-sm-10">
                            <input value="{{ $product->name}}" type="text" name="name" class="form-control border-info" id="name" readonly required>
                        </div>

                        <label for="unit_price" class="col-sm-10 col-form-label" style="font-size: 20px;">Unit Price*     : </label>
                        <div class="col-sm-10">
                            <input value="{{ $product->unit_price}}" type="text" name="unit_price" class="form-control border-info" id="unit_price" readonly required>
                        </div>

                        <label for="qty_in_stock" class="col-sm-10 col-form-label" style="font-size: 20px;">Quantity In Stock*     : </label>
                        <div class="col-sm-10">
                            <input value="{{ $product->qty_in_stock}}" type="text" name="qty_in_stock" class="form-control border-info" id="qty_in_stock" readonly vlaue="0" required>
                        </div>

                        <label for="description" class="col-sm-10 col-form-label" style="font-size: 20px;">Description     : </label>
                        <div class="col-sm-10">
                            <textarea type="text" name="description" class="form-control border-info" id="description"  readonly>{{ $product->description}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="image" class="col-sm-6 col-form-label">Image</label>
                    <img src="{{asset($product->image_url)}}" alt="w-100">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('backends.products.index')}}" class="btn btn-primary mr-2">Back to list</a>
                    <button class="btn btn-light">Cancel</button>
                </div>
            </div>


        </form>
    </div>

@endsection
