@extends('layouts.backend')
@section('pageTitle')Edit Products @endsection
@section('content')
    <div class="col-12">
        <h4 class="card-title" style="font-size: 21px;">Edit Product</h4>
        <form action="{{ route('backends.products.update', $product) }}" class="forms-sample" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT');
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="category_id" class="col-sm-10 col-form-label" style="font-size: 20px;">Category*     : </label>
                        <div class="col-sm-10">
                            <select type="text" name="category_id" class="form-control border-info" id="category_id" placeholder="Name" required>
                                <option value=""> ------- Choose Category ------- </option>
                                @foreach($categories as $id => $title)
                                    <option @if($product->category_id == $id) selected  @endif value="{{ $id }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="name" class="col-sm-10 col-form-label" style="font-size: 20px;">Name*     : </label>
                        <div class="col-sm-10">
                            <input value="{{ $product->name}}" type="text" name="name" class="form-control border-info" id="name" placeholder="Name" required>
                        </div>

                        <label for="unit_price" class="col-sm-10 col-form-label" style="font-size: 20px;">Unit Price*     : </label>
                        <div class="col-sm-10">
                            <input value="{{ $product->unit_price}}" type="text" name="unit_price" class="form-control border-info" id="unit_price" placeholder="Unit Price" required>
                        </div>

                        <label for="qty_in_stock" class="col-sm-10 col-form-label" style="font-size: 20px;">Quantity In Stock*     : </label>
                        <div class="col-sm-10">
                            <input value="{{ $product->qty_in_stock}}" type="text" name="qty_in_stock" class="form-control border-info" id="qty_in_stock" placeholder="Quantity In Stock" vlaue="0" required>
                        </div>

                        <label for="description" class="col-sm-10 col-form-label" style="font-size: 20px;">Description     : </label>
                        <div class="col-sm-10">
                            <textarea type="text" name="description" class="form-control border-info" id="description" placeholder="Description">{{ $product->description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="image" class="col-sm-6 col-form-label">Image</label>
                    <input type="file" class="col-sm-6 form-control border-info" id="image" name="image" accept="image/png, image/jpg, image/webp, image/svg">
                    <span>Keep it blank if you do not want to change image</span>
                    <h3>Selected image</h3>
                    <img src="{{asset($product->image_url)}}" alt="w-100">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('backends.products.index') }}" class="btn btn-outline-secondary mt-3">Cancel</a>
            </div>
        </div>
    </div>
@endsection