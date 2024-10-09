@extends('layouts.app')

@section('pageTitle') Cart @endsection

@section('breadcrumb_text_heading')
    Cart
@endsection

@section('breadcrumb_text_label')
    <li class="breadcrumb-item text-success active" aria-current="page">Cart</li>
@endsection

@section('content')
    <div class="container-xxl py-5 table-responsive">  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @if ($carts->isEmpty())
                    <tr>
                        <td colspan="10">No items in cart</td>
                    </tr>
                @else
                    @foreach($carts as $cart)
                        <tr>
                            <th>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($cart->product->image_url) }}" class="img-fluid" style="width: 80px; height: 80px;">
                                </div>
                            </th>
                            <td>
                                <p class="">{{ $cart->product->name }}</p>    
                            </td>
                            <td>
                                <p>${{ $cart->product->unit_price }}</p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="input-group" style="width: 125px">
                                        <div class="input-group-btn me-2">
                                            <form action="{{ route('carts.update.qty', $cart) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="new_qty" value="{{ $cart->qty-1 }}">
                                                <button type="submit" class="btn btn-sm rounded-circle bg-light border">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0 btn btn-primary" value="{{ $cart->qty }}" style="width: 20px; border-radius: 20px 5px;">
                                        <div class="input-group-btn ms-2">
                                            <form action="{{ route('carts.update.qty', $cart) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="new_qty" value="{{ $cart->qty+1 }}">
                                                <button type="submit" class="btn btn-sm rounded-circle bg-light border">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>${{ $cart->total }}</p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('carts.destroy', $cart) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="deleteProduct( '{{ $cart->id }}' )" type="submit" class="btn btn-danger btn-sm btn-icon-text">
                                            Delete
                                            <span class="fa-1x">
                                                <i class="fa-regular fa-trash-can fa-beat-fade"></i>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                                
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="container-xxl py-5 table-responsive d-flex justify-content-end">
        <table class="table table-striped" style="width: 500px">
            <thead>
                <tr class="text-center">
                    <td colspan="5">
                        <h4>Cart Total <span class="text-warning">Payment</span></h3>
                    </td>
                </tr>
                <tr>
                    <td>Nº</td>
                    <td>Name</td>
                    <td>Qty</td>
                    <td>Price</td>
                    <td>Amount</td>
                </tr>
            </thead>
            <tbody>
                @if ($carts->isEmpty())
                    <tr>
                        <td colspan="10">No items in cart</td>
                    </tr>
                @else
                    @foreach($carts as $cart)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>
                        <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                            {{ $cart->product->name }}
                        </div>
                    </td>
                    <td>{{ $cart->qty }}</td>
                    <td>${{ $cart->product->unit_price }}</td>
                    <td>${{ $cart->total }}</td>
                </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <tr>
                        <td colspan="5">
                            <h4 class="d-flex justify-content-end text-warning">Grand Total Dollar : ${{ $subTotal }}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="border: none;">
                            <p class="d-flex justify-content-end">Thank you ! Please come again</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="border: none;">
                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary" style="height: 50px; width: 200px; border-radius: 20px;">
                                    proceed checkout
                                </button>
                            </form>
                        </td>
                    </tr>
                </tr>
            </tfoot>
        </table>
    </div>
    @include('includes.page_footer')
@endsection